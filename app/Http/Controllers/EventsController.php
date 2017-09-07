<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventsController extends Controller {

    public function get_events() {
      $this->update();
      $events = Event::orderBy('date', 'desc')->get();
      return view('events.index', [
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
          $event->status = false; //Event has passed
          $event->save();
        }
      }
    }

    public function get_single_event($id) {
      $event = Event::find($id);
      return view('events.event', compact('event'));
    }

    public function display_form() {
      return view('cms.event_form');
    }

    public function create() {
      
    }

}
