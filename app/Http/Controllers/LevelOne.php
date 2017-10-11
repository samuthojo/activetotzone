<?php

namespace App\Http\Controllers;

use App\Book;
use App\ImportantDate;
use App\SlideShow;
use App\WorkSheet;
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
      $slides = SlideShow::all();

      return view('index', [
        'title' => "Active TOT'S ZONE",
        'blogs' => $blogs,
        'slides' => $slides
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

    public function books() {
        $books = Book::orderBy('id', 'desc')->get();
        return view('books.index', [
            'books' => $books,
        ]);
    }

    public function work_sheets() {
        $work_sheets = WorkSheet::orderBy('id', 'desc')->get();
        return view('work_sheets.index', [
            'work_sheets' => $work_sheets,
        ]);
    }

    public function gallery() {
        return view('level_two.gallery', [
            'title' => "Gallery - Active TOT'S ZONE",
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
        // $events = Event::orderBy('date', 'desc')->get();
        $events = Event::orderBy('date', 'desc')->limit(4)->get()->map(function($e){
            $event = $e;
            $event->locationName = $e->getLocationName();
            $event->coordinates = $e->getLocationCoords();

            return $event;
        });

         return view('level_one.events', [
           'events' => $events,
           'next_event' => $events->first(),
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
