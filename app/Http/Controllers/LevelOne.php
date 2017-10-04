<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ActiveTotRepo;
use App\Event;

class LevelOne extends Controller {

    protected $active_repo;

    public function __construct(ActiveTotRepo $repo) {
      $this->active_repo = $repo;
    }

    public function index() {
      $blogs = $this->active_repo->get_top_three_blogs();
      return view('index', [
        'title' => "Active TOT'S ZONE",
        'blogs' => $blogs,
      ]);
    }

    public  function about_us(){
        $title = "About - Active TOT'S ZONE";
        return view('level_two.about_us', [
          'title' => $title,
        ]);
    }

    public function video($category) {
      $videos = $this->active_repo->get_video_by_category($category);
      return view('level_two.video_lessons', [
        'title'=>"Video Lessons - Active TOT'S ZONE",
        'videos' => $videos,
        'video_cat'=>$category,
      ]);
    }

    public function blog() {
      $blogs = $this->active_repo->get_blog();
      return view('level_two.blog', [
        'blogs' => $blogs,
        'title' => "Blog - Active TOT'S ZONE",
      ]);
    }

    public function contactUs() {
      return view('level_two.contact_us', [
        'title' => "Contact Us - Active TOT'S ZONE",
      ]);
    }

    public function calendar(){
      return view('level_two.calendar', [
        'title' => "Calendar - Active TOT'S ZONE",
      ]);
    }

    public function events() {
      $this->update();
      $events = Event::orderBy('date', 'desc')->get();
      // $events->map(function($event){
      //   return {
      //     status =
      //   }
      // });
      return view('level_one.events', [
        'events' => $events,
      ]);
    }

    /**
     * Check whether the event is still active, if not set status = false
     * @param status
     * @return void
     */
    private function update() {
      $events = Event::where('status', true)->get();
      foreach($events as $event) {
        if($event->date < date('Y-m-d')) {
          $event->status = false; //Event has already passed
          $event->save();
        }
      }
    }


    public function send_email(){
        $to=$_POST["to"];
        $subject=$_POST["subject"];
        $message="My name is ".$_POST['userName']." my email is ".$_POST['email']." my phone number is ".$_POST['phonenumber']." I live around  ".$_POST['location'];
        $sender=$_POST["email"];
        $headers = 'From: '.$sender. "\r\n" .
            'Reply-To:'.$sender. "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message,null);

        echo json_encode("success");
    }
}
