<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ActiveTotRepo;

use App\SlideShow;
use App\Event;
use App\Book;
use App\WorkSheet;
use App\Testimonial;
use App\ImportantDate;

use Image;

use Imagick;

class Cms extends Controller {

  public $active_repo;

  public function __construct(ActiveTotRepo $active_repo) {
    $this->middleware('auth');
    $this->active_repo = $active_repo;
  }

  public function form_add($form_name){
      if(strcasecmp($form_name, "team") == 0){
          return view('cms.team_add');
      }else if(strcasecmp($form_name, "blog") == 0){
          return view('cms.blog_add');
      }else if(strcasecmp($form_name, "video") == 0){
          return view('cms.video_add');
      }else if(strcasecmp($form_name, "book") == 0){
          return view('cms.book_add');
      }else if(strcasecmp($form_name, "event") == 0){
          return view('cms.event_add');
      }else if(strcasecmp($form_name, "important_date") == 0){
          return view('cms.important_date_add');
      }
      else if(strcasecmp($form_name, "worksheet") == 0){
          return view('cms.worksheet_add');
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
          return view("cms.book_edit",[
            'edit_details' => $edit_details,
          ]);
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
        return view('cms.worksheet_edit', compact('edit_details'));
      }
      else if(strcasecmp($form_name, 'testimonial') == 0) {
        return view('cms.testimonial_edit', compact('edit_details'));
      }
    }

    public function save_form_changes(Request $request, $form_name){
        $this->active_repo->save_changes($form_name, $request);
        if(strcasecmp($form_name, "team") == 0){
            $team = $this->active_repo->get_team();
            return view('cms.team', [
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
        }
        else if(strcasecmp($form_name, 'important_date') == 0) {
          return $this->important_dates();
        }
        else if(strcasecmp($form_name, 'worksheet') == 0) {
          return $this->worksheets();
        }
        else if(strcasecmp($form_name, 'testimonial') == 0) {
          return $this->testimonials();
        }
        else if(strcasecmp($form_name, 'event') == 0) {
          return $this->events();
        }
        else if(strcasecmp($form_name, 'book') == 0) {
          $books = Book::orderBy('id', 'desc')->get();
          return view('cms.book', compact('books'));
        }
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
            extract($request->all());
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
            Book::create(compact('title', 'author', 'date_published',
                                 'description', 'cover_image', 'book_url'));
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
            }
          }
          Event::create(compact('title', 'date', 'link', 'description',
                                'location', 'time', 'picture'));
          return $this->events();
        }
        else if(strcasecmp($form_name, 'important_date') == 0) {
          ImportantDate::create($request->all());
          return $this->important_dates();
        }
        else if(strcasecmp($form_name, 'worksheet') == 0) {
          extract($request->all());
          $worksheet = "";
          if($request->hasFile('worksheet')) {
            $file = $request->file('worksheet');
            if($file->isValid()) {
              $worksheet = $file->getClientOriginalName();
              $file->move('uploads/worksheets', $worksheet);
              $this->worksheetPreview($worksheet);
            }
          }
          WorkSheet::create(compact('type', 'worksheet'));
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

    private function worksheetPreview($file_name) {

      $location = 'uploads/worksheets/' . $file_name;

      // read page 1
      $im = new imagick($location . '[0]');

      // convert to jpg
      $im->setImageColorspace(255);
      $im->setCompression(Imagick::COMPRESSION_JPEG);
      $im->setCompressionQuality(60);
      $im->setImageFormat('jpeg');

      //resize
      $im->resizeImage(290, 375, imagick::FILTER_LANCZOS, 1);

      //write image on server
      $im->writeImage('uploads/worksheets/thumbs/' . $file_name);

    }

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
}
