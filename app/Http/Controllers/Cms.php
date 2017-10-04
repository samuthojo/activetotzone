<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ActiveTotRepo;

use App\SlideShow;

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
      $slideshows = SlideShow::orderBy('id', 'desc')->take(4);
      return view('slideshow', compact('slideshows'));
    }

    public function store(Request $request) {
      $file = "";
      if($request->hasFile('slideshow')) {
        $file = $request->file('slideshow');
        if($file->isValid()) {
          $file_name = $file->getClientOriginalName();
          $location = 'uploads/slideshows/' . $file_name;
          move_uploaded_file($file->path(), $location);
          save_thumb($file_name);
          SlideShow::firstOrCreate(['slideshow' => $file_name, ]);
        }
      }
    }

    private function save_thumb($file_name) {
      $base_location = 'uploads/slideshows/';
      $thumb_location = $base_location . 'thumbs/' . $file_name;
      $image = Image::make($base_location . '/' . $file_name);
      $image = $image->resize(300, null, function($constraint) {
                  $constraint->aspectRatio();
              });
      $image->save($thumb_location, 20);
    }

}
