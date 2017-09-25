<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ActiveTotRepo;

class ActiveTotControllerTwo extends Controller {

  public $active_repo;

  public function __construct(ActiveTotRepo $repo) {
    $this->active_repo = $repo;
  }

  public  function read($blog_id,$blog_title){

      $title = "Blogs - Active TOT'S ZONE";

      //$blog_title = str_replace("-", " ", $blog_title);
      $blog = $this->active_repo->get_blog_details($blog_id);

      return view('level_three.read', [
        'title' => $title,
        'blog' => $blog,
      ]);
  }

  public  function watch($video_id,$video_title){

      $video = $this->active_repo->fetch_individual_data("video",$video_id);

      return view('level_three.watch', [
        'title' => "Contact Us - Active TOT'S ZONE",
        'video' => $video,
      ]);
  }

}
