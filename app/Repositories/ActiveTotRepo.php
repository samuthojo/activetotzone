<?php

namespace App\Repositories;

use App\Blog;
use App\Video;
use App\Login;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ActiveTotRepo {

  public function time_stamp_converter($time){
      list($month,$day,$year) = explode('/', trim($time));
      $converted_time =  mktime(0, 0, 0, $month, $day, $year);
      return $converted_time;
  }

  public function load_login_credentials(){
      $credentials = Login::first(['username', 'password',]);
      return $credentials;
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
      }
  }

public function save_changes($form_name, $request){
      if(strcasecmp($form_name, "team") == 0){
          Team::where('id', $request->input('edit_id'))
              ->update([
                  'name' => $request->input('name'),
                  'position' => $request->input('position'),
                  'description' => $request->input('description'),
              ]);

      }else if(strcasecmp($form_name, "video") == 0){
          Video::where('id', $request->input('edit_id'))
                ->update([
                    'link' => $request->input('link'),
                    'date' => $request->input('date'),
                    'category' => $request->input('category'),
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                ]);

      }else if(strcasecmp($form_name, "blog") == 0){
          Blog::where('id', $request->input('edit_id'))
              ->update([
                  'date' => $request->input('date'),
                  'author' => $request->input('author'),
                  'title' => $request->input('title'),
                  'description' => $request->input('description'),
              ]);
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

  public function change_pass($request){
          $return_status = "";
          $old_password = $request->input('old_password');
          $new_password = $request->input('new_password');
          $confirm_pass = $request->input('confirm_password');
          $user = Auth::user();
          if(strcmp($new_password, $confirm_pass) == 0) {
            if(strcmp($user->password, md5($old_password)) == 0) {
              $user->password = $confirm_pass;
              $user->save();
              $return_status = "Password successfully changed";
            } else {
              $return_status = "Please enter the right old password";
            }
          } else {
            $return_status = "New passwords do not match";
          }
          return $return_status;
      }
    //   if($request->input('old_password') == null) {
    //     return "hi";
    //   } else {
    //     return "haa";
    //   }
    // }
}
