<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventsController extends Controller {

    public function get_events() {
      $this->update();
      $events = Event::orderBy('date', 'desc')->get();
      // $events->map(function($event){
      //   return {
      //     status =
      //   }
      // });
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
          $event->status = false; //Event has already passed
          $event->save();
        }
      }
    }

    public function get_single_event($id) {
      $event = Event::find($id);
      return view('events.event', [
        'event' => $event,
      ]);
    }

    public function display_form() {
      return view('events.event_form');
    }

    public function create() {
      function saveThumb(Request $request){
            $image = $request->file('image_url');

            $destinationPath = public_path('images/events/');
            $img = Image::make($image->getRealPath());
            $new_image_name = time() . '.' . $image->getClientOriginalExtension();
            $img->save($destinationPath.$new_image_name, 20);

            $destinationPath = public_path('images/events/thumbs/');
            $thumb_path = $destinationPath.$new_image_name;

            $img->resize(rand (400, 800), null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumb_path, 20);

            return $new_image_name;
        }

        $event = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'venue' => $request->input('venue'),
            'link' => $request->input('link'),
            'picture' => saveThumb($request),
        ];

        Event::create($event);

        $events = Event::orderBy('date', 'desc')->get();
        return view('events.index', [
          'events' => $events,
        ]);
    }

    public function delete($id) {
      $event = Event::find($id);
      $event->delete(); //The event will be softDeleted
      $events = Event::orderBy('date', 'desc')->get();
      return view('events.index', [
        'events' => $events,
      ]);
    }

}
