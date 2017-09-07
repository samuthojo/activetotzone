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

            // Retrieve a file from the request.
            // file($key = null, $default = null)
            $image = $request->file('image_url');

            // The public_path function returns the fully qualified path to the public directory:
            // $path = public_path();
            $destinationPath = public_path('images/events/');

            // This method creates a new image resource from file
            // $img = Image::make('public/foo.jpg')

            // This method expands all symbolic links, resolves relative
            // references and returns the real path to the file.
            // public string SplFileInfo::getRealPath ( void )
            $img = Image::make($image->getRealPath());

            // This method returns the original file extension
            // It is called on an UploadedFile instance
            $new_image_name = time().'.'.$image->getClientOriginalExtension();
            $img->save($destinationPath.$new_image_name,20);

            $destinationPath = public_path('images/events/thumbs/');
            $thumb_path = $destinationPath.$new_image_name;

            $img->resize(rand (400, 800), null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumb_path,20);

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

        return Event::create($event);
    }

}
