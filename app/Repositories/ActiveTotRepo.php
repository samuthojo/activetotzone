<?php

namespace App\Repositories;

use App\Blog;
use App\Video;
use App\Login;
use App\Team;
use App\User;
use App\Book;
use App\Event;
use App\SlideShow;
use App\ImportantDate;
use App\WorkSheet;
use App\Testimonial;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ActiveTotRepo {

  public function time_stamp_converter($time){
      list($month,$day,$year) = explode('/', trim($time));
      $converted_time =  mktime(0, 0, 0, $month, $day, $year);
      return $converted_time;
  }

  public function save_data($request, $form_name, $filename){
      if($form_name == "team") {
        Team::create([
          'name' => $request->input('name'),
          'image' => $filename,
          'description' => $request->input('description'),
          'position' => $request->input('position'),
        ]);
      } else if($form_name == "video"){
          Video::create([
            'link' => $request->input('link'),
            'date' => $request->input('date'),
            'category' => $request->input('category'),
            'title' => $request->input('title'),
            'image' => $filename,
            'description' =>  $request->input('description'),
          ]);
      } else if($form_name == "blog"){
          Blog::create([
            'date' => $request->input('date'),
            'author' => $request->input('author'),
            'title' => $request->input('title'),
            'image' => $filename,
            'description' => $request->input('description'),
          ]);
     }
  }

public  function fetch_individual_data($form_name,$id){
      if($form_name == "team"){
          $team = Team::find($id);
          return $team;
      }else if($form_name == "blog"){
          $blog = Blog::find($id);
          return $blog;
      }else if($form_name == "video"){
          $video = Video::find($id);
          return $video;
      }else if($form_name == "book"){
          $book = Book::find($id);
          return $book;
      }else if($form_name == "event"){
          $event = Event::find($id);
          return $event;
      }
      else if(strcasecmp($form_name, 'important_date') == 0) {
        $important_date = ImportantDate::find($id);
        return $important_date;
      }
      else if(strcasecmp($form_name, 'worksheet') == 0) {
        $worksheet = WorkSheet::find($id);
        return $worksheet;
      }
      else if(strcasecmp($form_name, 'testimonial') == 0) {
        $testimonial = Testimonial::find($id);
        return $testimonial;
      }
  }

public function save_changes($form_name, $request){
      if(strcasecmp($form_name, "team") == 0){
          Team::where('id', $request->input('id'))
              ->update([
                  'name' => $request->input('name'),
                  'position' => $request->input('position'),
                  'description' => $request->input('description'),
              ]);

      }else if(strcasecmp($form_name, "video") == 0){
          Video::where('id', $request->input('id'))
                ->update([
                    'link' => $request->input('link'),
                    'date' => $request->input('date'),
                    'category' => $request->input('category'),
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                ]);

      }else if(strcasecmp($form_name, "blog") == 0){
          Blog::where('id', $request->input('id'))
              ->update([
                  'date' => $request->input('date'),
                  'author' => $request->input('author'),
                  'title' => $request->input('title'),
                  'description' => $request->input('description'),
              ]);
      }
      else if(strcasecmp($form_name, 'important_date') == 0) {
        $id = $request->input('id');
        $data = $request->except('id', 'date');
        $date = Carbon::parse(request('date'))->format('Y-m-d');
        $data = array_add($data, 'date', $date);
        ImportantDate::where('id', $id)->update($data);
      }

      else if(strcasecmp($form_name, 'testimonial') == 0) {
        Testimonial::where('id', $request->input('id'))
                     ->update($request->except('id'));
      }

  }

  public function delete_records($form_name,$id){
      if(strcasecmp($form_name, "team") == 0){
          $team = Team::find($id);
          $team->delete(); //The model instance will be soft deleteted
      }else if(strcasecmp($form_name, "blog") == 0){
          $blog = Blog::find($id);
          $blog->delete(); //The model instance will be soft deleted
      }else if(strcasecmp($form_name, "video") == 0){
          $video = Video::find($id);
          $video->delete(); //The model instance will be soft deleted
      }else if(strcasecmp($form_name, "book") == 0){
          $book = Book::find($id);
          $book->delete(); //The model instance will be soft deleted
      }else if(strcasecmp($form_name, "event") == 0){
          $event = Event::find($id);
          $event->delete(); //The model instance will be soft deleted
      }else if(strcasecmp($form_name, "slideshow") == 0){
          $slideshow = SlideShow::find($id);
          $slideshow->delete(); //The model instance will be soft deleted
      }
      else if(strcasecmp($form_name, "worksheet") == 0){
          $worksheet = WorkSheet::find($id);
          $worksheet->delete(); //The model instance will be soft deleted
      }
      else if(strcasecmp($form_name, "testimonial") == 0){
          $testimonial = Testimonial::find($id);
          $testimonial->delete(); //The model instance will be soft deleted
      }
      else if(strcasecmp($form_name, "important_date") == 0){
          $important_date = ImportantDate::find($id);
          $important_date->delete(); //The model instance will be soft deleted
      }
  }

  public function replace_image($form_name,$file_name,$id){
      if($form_name == "team"){
          Team::where('id', $id)->update(['image' => $file_name,]);

      }else if($form_name == "video"){
          Video::where('id', $id)->update(['image' => $file_name,]);

      }else if($form_name == "blog"){
          Blog::where('id', $id)->update(['image' => $file_name,]);
      }
  }

  public function get_team(){
      $team = Team::orderBy('id', 'desc')->get();
      return $team;
  }

  public function get_video(){
      $video = Video::orderBy('id', 'desc')->get();
      return $video;
  }

  public function get_video_by_category($category){
      $videos = Video::where('category', $category)->orderBy('id', 'desc')->get();
      return $videos;
  }

  public function get_blog(){
      $blogs = Blog::orderBy('id', 'desc')->get();
      return $blogs;
  }

  public function get_top_three_blogs(){
      $blogs = Blog::orderBy('id', 'desc')->take(3)->get();
      return $blogs;
  }

  public function get_blog_details($blog_id){
      $blog = Blog::find($blog_id);
      return $blog;
  }

}
