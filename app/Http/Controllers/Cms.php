<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ActiveTotRepo;

use App\SlideShow;
use App\Event;
use App\Book;
use App\WorkSheet;
use App\WorkSheetGrade;
use App\WorkSheetSubject;
use App\WorkSheetSubSubject;
use App\Grade;
use App\Subject;
use App\SubSubject;
use App\Testimonial;
use App\ImportantDate;

use Image;
use Carbon\Carbon;

// use Imagick;

class Cms extends Controller {

  public $active_repo;

  public function __construct(ActiveTotRepo $active_repo) {
    $this->middleware('auth');
    $this->active_repo = $active_repo;
  }

  private function getBookFilters() {
    $grades = Grade::all();
    $subjects = Subject::all();
    return compact('grades', 'subjects');
  }

  private function getWorksheetFilters() {
    $grades = WorkSheetGrade::all();
    $subjects = WorkSheetSubject::all();
    return compact('grades', 'subjects');
  }

  public function form_add($form_name){
      if(strcasecmp($form_name, "team") == 0){
          return view('cms.team_add');
      }else if(strcasecmp($form_name, "blog") == 0){
          return view('cms.blog_add');
      }else if(strcasecmp($form_name, "video") == 0){
          return view('cms.video_add');
      }else if(strcasecmp($form_name, "book") == 0){
          return view('cms.book_add', $this->getBookFilters());
      }else if(strcasecmp($form_name, "event") == 0){
          return view('cms.event_add');
      }else if(strcasecmp($form_name, "important_date") == 0){
          return view('cms.important_date_add');
      }
      else if(strcasecmp($form_name, "worksheet") == 0){
          return view('cms.worksheet_add', $this->getWorksheetFilters());
      }
      else if(strcasecmp($form_name, "testimonial") == 0){
          return view('cms.testimonial_add');
      }
  }

  public function cms_blog() {
      $blogs = $this->active_repo->get_blog();
      return view('cms.blog', [
        'blogs' => $blogs,
      ]);
  }

  public function cms_video() {
        $video = $this->active_repo->get_video();
        return view('cms.video', [
          'video' => $video,
        ]);
  }

  public function team(){
        $team = $this->active_repo->get_team();
        return view('cms.team', [
          'team' => $team,
        ]);
    }

    public function blog_details($blog_id){
        $blog = $this->active_repo->get_blog_details($blog_id);
        return view('cms.blog_details', [
          'blog' => $blog,
      ]);
    }

    public function form_edit($form_name, $id) {
      $edit_details = $this->active_repo->fetch_individual_data($form_name,$id);
      if(strcasecmp($form_name, "team") == 0){
          return view("cms.team_edit",[
            'edit_details' => $edit_details,
          ]);
      }else if(strcasecmp($form_name, "video") == 0){
          return view("cms.video_edit",[
            'edit_details' => $edit_details,
          ]);
      }else if(strcasecmp($form_name, "blog") == 0){
          return view("cms.blog_edit",[
            'edit_details' => $edit_details,
          ]);
      }
      else if(strcasecmp($form_name, "book") == 0){
        $edit_details = Book::find($id);
        $grades = Grade::all();
        $subjects = Subject::all();
        $sub_subjects = $edit_details->subject()->first()->subSubjects;
          return view("cms.book_edit", compact('edit_details', 'grades', 'subjects', 'sub_subjects'));
      }
      else if(strcasecmp($form_name, "event") == 0){
          return view("cms.event_edit",[
            'edit_details' => $edit_details,
          ]);
      }
      else if(strcasecmp($form_name, 'important_date') == 0) {
        return view('cms.important_date_edit', compact('edit_details'));
      }
      else if(strcasecmp($form_name, 'worksheet') == 0) {
        $edit_details = Worksheet::find($id);
        $grades = WorkSheetGrade::all();
        $subjects = WorkSheetSubject::all();
        $sub_subjects = $edit_details->workSheetSubject()->first()->workSheetSubSubjects;
        return view('cms.worksheet_edit', compact('edit_details', 'grades', 'subjects', 'sub_subjects'));
      }
      else if(strcasecmp($form_name, 'testimonial') == 0) {
        return view('cms.testimonial_edit', compact('edit_details'));
      }
    }

    public function save_form_changes(Request $request, $form_name){
        if(strcasecmp($form_name, "team") == 0){
            $this->active_repo->save_changes($form_name, $request);
            $team = $this->active_repo->get_team();
            return view('cms.team', [
              'team' => $team,
            ]);
        }else if(strcasecmp($form_name, "video") == 0){
            $this->active_repo->save_changes($form_name, $request);
            $video = $this->active_repo->get_video();
            return view('cms.video', [
              'video' => $video,
            ]);
        }else if(strcasecmp($form_name, "blog") == 0){
            $this->active_repo->save_changes($form_name, $request);
            $blogs = $this->active_repo->get_blog();
            return view('cms.blog', [
              'blogs' => $blogs,
            ]);
        }
        else if(strcasecmp($form_name, 'important_date') == 0) {
          $this->active_repo->save_changes($form_name, $request);
          return $this->important_dates();
        }
        else if(strcasecmp($form_name, 'testimonial') == 0) {
          $this->active_repo->save_changes($form_name, $request);
          return $this->testimonials();
        }
        else if(strcasecmp($form_name, 'worksheet') == 0) {
          return $this->saveWorksheetChanges();
        }
        else if(strcasecmp($form_name, 'event') == 0) {
          return $this->saveEventChanges();
        }
        else if(strcasecmp($form_name, 'book') == 0) {
          return $this->saveBookChanges();
        }
    }

    public function saveWorksheetChanges() {
      $request = request();
      $id = request('id');
      $data = $request->except('id', 'worksheet', 'picture');
      $is_valid_file = false;
      $is_valid_picture = false;
      $worksheet = "";
      $pic_name = "";
      if($request->hasFile('worksheet') && $request->hasFile('picture')) {
        $sheet = $request->file('worksheet');
        $picture = $request->file('picture');
        if($sheet->isValid()) {
          $is_valid_file = true;
          $worksheet = $sheet->getClientOriginalName();
          $sheet->move('uploads/worksheets', $worksheet);
        }
        if($picture->isValid()) {
          $is_valid_picture = true;
          $pic_name = $picture->getClientOriginalName();
          $picture->move('uploads/worksheets/cover_pictures', $pic_name);
        }
        if($is_valid_file && $is_valid_picture) {
          $data = array_add($data, 'worksheet', $worksheet);
          $data = array_add($data, 'picture', $pic_name);
          WorkSheet::where('id', $id)->update($data);
        }
      }
      else if ($request->hasFile('worksheet')) {
        $sheet = $request->file('worksheet');
        if($sheet->isValid()) {
          $worksheet = $sheet->getClientOriginalName();
          $sheet->move('uploads/worksheets', $worksheet);
          $data = array_add($data, 'worksheet', $worksheet);
          WorkSheet::where('id', $id)->update($data);
        }
      } else if($request->hasFile('picture')) {
        $picture = $request->file('picture');
        if($picture->isValid()) {
          $pic_name = $picture->getClientOriginalName();
          $picture->move('uploads/worksheets/cover_pictures', $pic_name);
          $data = array_add($data, 'picture', $pic_name);
          WorkSheet::where('id', $id)->update($data);
        }
      }
      else {
        WorkSheet::where('id', $id)->update($data);
      }
      return $this->worksheets();
    }

    public function saveEventChanges() {
      $request = request();
      $id = request('id');
      $data = $request->except('id', 'file', 'date');
      $date = Carbon::parse(request('date'))->format('Y-m-d');
      if($request->hasFile('file')) {
        $picture = $request->file('file');
        if($picture->isValid()) {
          $picture_name = $picture->getClientOriginalName();
          $picture->move('uploads/events', $picture_name);
          $this->save_thumb('event', $picture_name);
          $data = array_add($data, 'picture', $picture_name);
          $data = array_add($data, 'date', $date);
          Event::where('id', $id)->update($data);
        }
      } else {
        $data = array_add($data, 'date', $date);
        Event::where('id', $id)->update($data);
      }
      return $this->events();
    }

    public function saveBookChanges() {
      $request = request();
      $id = request('id');
      $data = $request->except('id', 'cover_image', 'book_url');
      if($request->hasFile('cover_image') && $request->hasFile('book_url')) {
        $cover = $request->file('cover_image');
        $book = $request->file('book_url');
        if($cover->isValid() && $book->isValid()) {
          $cover_image = $cover->getClientOriginalName();
          $book_url = $book->getClientOriginalName();
          $cover->move('uploads/book_covers', $cover_image);
          $book->move('uploads/books', $book_url);
          $this->save_thumb('cover', $cover_image);
          $data = array_add($data, 'cover_image', $cover_image);
          $data = array_add($data, 'book_url', $book_url);
          Book::where('id', $id)->update($data);
        }
      }else if($request->hasFile('cover_image'))  {
        $cover = $request->file('cover_image');
        if($cover->isValid()) {
          $cover_image = $cover->getClientOriginalName();
          $cover->move('uploads/book_covers', $cover_image);
          $this->save_thumb('cover', $cover_image);
          $data = array_add($data, 'cover_image', $cover_image);
          Book::where('id', $id)->update($data);
        }
      }else if($request->hasFile('book_url')) {
        $book = $request->file('book_url');
        if($book->isValid()) {
          $book_url = $book->getClientOriginalName();
          $book->move('uploads/books', $book_url);
          $data = array_add($data, 'book_url', $book_url);
          Book::where('id', $id)->update($data);
        }
      }else {
        Book::where('id', $id)->update($data);
      }
      $books = Book::orderBy('id', 'desc')->get();
      return view('cms.book', compact('books'));
    }

    public function form_delete($form_name,$id){
        $this->active_repo->delete_records($form_name,$id);
        if(strcasecmp($form_name, "team") == 0){
            $team = $this->active_repo->get_team();
            return view('cms.team',[
              'team' => $team,
            ]);
        }else if(strcasecmp($form_name, "video") == 0){
            $video = $this->active_repo->get_video();
            return view('cms.video', [
              'video' => $video,
            ]);
        }else if(strcasecmp($form_name, "blog") == 0){
            $blogs = $this->active_repo->get_blog();
            return view('cms.blog', [
              'blogs' => $blogs,
            ]);
        }else if(strcasecmp($form_name, "book") == 0){
            $books = Book::orderBy('id', 'desc')->get();
            return view('cms.book', compact('books'));
        }
        else if(strcasecmp($form_name, 'event') == 0) {
          return $this->events();
        }
        else if(strcasecmp($form_name, "slideshow") == 0) {
            return $this->slideshows();
        }
        else if(strcasecmp($form_name, 'testimonial') == 0) {
          return $this->testimonials();
        }
        else if(strcasecmp($form_name, "worksheet") == 0) {
            return $this->worksheets();
        }
        else if(strcasecmp($form_name, "important_date") == 0) {
            return $this->important_dates();
        }
    }

    public function save_data(Request $request, $form_name){
        if(strcasecmp($form_name, "team") == 0){
            $file_name = $_FILES['file']['name'];
            $file_errors = $_FILES['file']['error'];
            $temp = explode(".", $file_name);
            $extension = end($temp);
            $allowedExts = ["jpg","jpeg","png","JPG","JPEG","PNG"];
            if(in_array($extension,$allowedExts)){
                if($file_errors < 1){
                    if($this->check_file_existence($file_name)){
                        $this->active_repo->save_data($request, $form_name,$file_name);
                    }
                }else{
                    echo $file_errors;
                }
            }else{
                echo "File extension not allowed";
            }

            $team = $this->active_repo->get_team();
            return view('cms.team', [
              'team' => $team,
            ]);
        }else if(strcasecmp($form_name, "video") == 0){
            $file_name = $_FILES['file']['name'];
            $file_errors = $_FILES['file']['error'];
            $temp = explode(".", $file_name);
            $extension = end($temp);
            $allowedExts = ["jpg","jpeg","png","JPG","JPEG","PNG"];
            if(in_array($extension,$allowedExts)){
                if($file_errors < 1){
                   // move_uploaded_file($_FILES['file']['tmp_name'],"uploads/".$file_name);
                    if($this->check_file_existence($file_name)){
                        $this->active_repo->save_data($request, $form_name,$file_name);
                    }
                }else{
                    echo $file_errors;
                }
            }else{
                echo "File extension not allowed";
            }

            $video = $this->active_repo->get_video();
            return view('cms.video', [
              'video' => $video,
            ]);
        }else if(strcasecmp($form_name, "blog") == 0){
            $file_name = $_FILES['file']['name'];
            $file_errors = $_FILES['file']['error'];
            $temp = explode(".", $file_name);
            $extension = end($temp);
            $allowedExts = ["jpg","jpeg","png","JPG","JPEG","PNG"];
            if(in_array($extension,$allowedExts)){
                if($file_errors < 1){
                    if($this->check_file_existence($file_name)){
                        $this->active_repo->save_data($request, $form_name,$file_name);
                    }
                }else{
                    echo $file_errors;
                }
            }else{
                echo "File extension not allowed";
            }

            $blogs = $this->active_repo->get_blog();
            return view('cms.blog', [
              'blogs' => $blogs,
            ]);
        } else if(strcasecmp($form_name, 'book') == 0) {
            $data = $request->except('book_url', 'cover_image');
            $image = "";
            $cover_image = "";
            $book = "";
            $book_url = "";
            if($request->hasFile('cover_image')) {
              $image = $request->file('cover_image');
              if($image->isValid()) {
                $cover_image = $image->getClientOriginalName();
                $image->move('uploads/book_covers', $cover_image);
                $this->save_thumb('cover', $cover_image);
              } else {
                echo 'The upload was not successful, please retry';
              }
            }
            if($request->hasFile('book_url')) {
              $book = $request->file('book_url');
              if($book->isValid()) {
                $book_url = $book->getClientOriginalName();
                $book->move('uploads/books', $book_url);
              } else {
                echo 'The upload was not successful, please retry';
              }
            }
            $data = array_add($data, 'book_url', $book_url);
            $data = array_add($data, 'cover_image', $cover_image);
            Book::create($data);
            $books = Book::orderBy('id', 'desc')->get();
            return view('cms.book', compact('books'));
        }
        else if(strcasecmp($form_name, 'event') == 0) {
          extract($request->all());
          $picture = "";
          $file = "";
          if($request->hasFile('file')) {
            $file = $request->file('file');
            if($file->isValid()) {
              $picture = $file->getClientOriginalName();
              $file->move('uploads/events', $picture);
              $this->save_thumb('event', $picture);
              Event::create(compact('title', 'date', 'link', 'description',
                                    'location', 'time', 'picture'));
            }
          }
          return $this->events();
        }
        else if(strcasecmp($form_name, 'important_date') == 0) {
          ImportantDate::create($request->all());
          return $this->important_dates();
        }
        else if(strcasecmp($form_name, 'worksheet') == 0) {
          $data = $request->except('worksheet', 'picture');
          $worksheet = "";
          $picture = "";
          $is_valid_file = false;
          $is_valid_picture = false;
          if($request->hasFile('worksheet') && $request->hasFile('picture')) {
            $file = $request->file('worksheet');
            $file2 = $request->file('picture');
            if($file->isValid()) {
              $worksheet = $file->getClientOriginalName();
              $file->move('uploads/worksheets', $worksheet);
              $is_valid_file = true;
            }
            if($file2->isValid()) {
              $picture = $file2->getClientOriginalName();
              $file2->move('uploads/worksheets/cover_pictures', $picture);
              $is_valid_picture = true;
            }
            if($is_valid_file && $is_valid_picture) {
              $data = array_add($data, 'worksheet', $worksheet);
              $data = array_add($data, 'picture', $picture);
              WorkSheet::create($data);
            }
          }

          return $this->worksheets();
        }
        else if(strcasecmp($form_name, 'testimonial') == 0) {
          Testimonial::create($request->all());
          return $this->testimonials();
        }
    }

    private function check_file_existence($file_name){
        if(!file_exists('uploads/'.$file_name)){
            move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $file_name);
            return true;
        }else{
            $split_array = explode(".",$file_name);
            $name = "activetotszone";
            $extension = $split_array[1];
            $random = mt_rand(1,1000);
            $name = $name.$random.".".$extension;

            return $this->check_file_existence($name);

        }
    }

    public function replace_image($form_name,$id){
        if (isset($_FILES['file']['name'])) {
            $file_name = $_FILES['file']['name'];
            if ($_FILES['file']['error'] == 0) {
                if($this->check_file_existence($file_name)){
                    $this->active_repo->replace_image($form_name,$file_name,$id);
                }
                if($form_name == "team"){
                    $team = $this->active_repo->get_team();
                    return view('cms.team', [
                      'team' => $team,
                    ]);
                }else if($form_name == "video"){
                    $video = $this->active_repo->get_video();
                    return view('cms.video', [
                      'video' => $video,
                    ]);
                }else if($form_name == "blog"){
                    $blog = $this->active_repo->get_blog_details($id);
                    return view('cms.blog_details', [
                      'blog' => $blog,
                    ]);
                }
            }
        }
    }

    public function slideshows() {
      $slideshows = SlideShow::orderBy('id', 'asc')->get();
      return view('slideshow', compact('slideshows'));
    }

    public function storeSlide(Request $request) {
      $file = "";
      if($request->hasFile('slideshow')) {
        $file = $request->file('slideshow');
        if($file->isValid()) {
          $file_name = $file->getClientOriginalName();
          $location = 'uploads/slideshows/' . $file_name;
          move_uploaded_file($file->path(), $location);
          $this->save_thumb('slideshow', $file_name);
          SlideShow::create(['slideshow' => $file_name, ]);
        }
      }
      return $this->slideshows();
    }

    public function updateSlide(Request $request, $id) {
      $file = "";
      if($request->hasFile('slideshow')) {
        $file = $request->file('slideshow');
        if($file->isValid()) {
          $file_name = $file->getClientOriginalName();
          $location = 'uploads/slideshows/' . $file_name;
          move_uploaded_file($file->path(), $location);
          $this->save_thumb('slideshow', $file_name);
          SlideShow::where('id', $id)->update(['slideshow' => $file_name, ]);
        }
      }
    }

    private function save_thumb($type, $file_name) {
      if(strcasecmp($type, 'slideshow') == 0) {
        $base_location = 'uploads/slideshows/';
        $thumb_location = public_path($base_location . 'thumbs/' . $file_name);
        $image = Image::make($base_location . $file_name);
        $image = $image->resize(300, null, function($constraint) {
                    $constraint->aspectRatio();
                });
        $image->save($thumb_location);
      }
      else if(strcasecmp($type, 'cover') == 0) {
        $base_location = 'uploads/book_covers/';
        $thumb_location = public_path($base_location . 'thumbs/' . $file_name);
        $image = Image::make($base_location . $file_name);
        $image = $image->resize(300, null, function($constraint) {
                    $constraint->aspectRatio();
                });
        $image->save($thumb_location);
      }
      else if(strcasecmp($type, 'event') == 0) {
        $base_location = 'uploads/events/';
        $thumb_location = public_path($base_location . 'thumbs/' . $file_name);
        $image = Image::make($base_location . $file_name);
        $image = $image->resize(300, null, function($constraint) {
                    $constraint->aspectRatio();
                });
        $image->save($thumb_location);
      }
    }

    // private function worksheetPreview($file_name) {
    //
    //   $location = 'uploads/worksheets/' . $file_name;
    //
    //   // read page 1
    //   $im = new imagick($location . '[0]');
    //
    //   // convert to jpg
    //   $im->setImageColorspace(255);
    //   $im->setCompression(Imagick::COMPRESSION_JPEG);
    //   $im->setCompressionQuality(60);
    //   $im->setImageFormat('jpeg');
    //
    //   //resize
    //   $im->resizeImage(290, 375, imagick::FILTER_LANCZOS, 1);
    //
    //   //write image on server
    //   $im->writeImage('uploads/worksheets/thumbs/' . $file_name);
    //
    // }

    public function events() {
      $events = Event::orderBy('id', 'desc')->get();
      return view('cms.event', compact('events'));
    }

    public function event_details(Event $event) {
      return view('cms.event_details', compact('event'));
    }

    public function important_dates() {
      $important_dates = ImportantDate::orderBy('id', 'desc')->get();
      return view('cms.important_date', compact('important_dates'));
    }

    public function worksheets() {
      $worksheets = WorkSheet::orderBy('id', 'desc')->get();
      return view('cms.worksheet', compact('worksheets'));
    }

    public function testimonials() {
      $testimonials = Testimonial::orderBy('id', 'desc')->get();
      return view('cms.testimonial', compact('testimonials'));
    }

    public function subSubjects(Subject $subject) {
      return response()->json($subject->subSubjects);
    }

    public function sheetSubSubjects(WorkSheetSubject $subject) {
      return response()->json($subject->workSheetSubSubjects);
    }
}
