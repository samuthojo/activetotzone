<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use Image;

class Events extends Controller {

    public function __construct() {
      $this->middleware('auth')->except(['get_events', 'update', ]);
    }


    public function get_single_event($id) {
      $event = Event::find($id);
      return view('cms.event_details', [
        'event' => $event,
      ]);
    }

    //the form to add an event
    public function display_form() {
      return view('cms.event_form');
    }

    //save the event
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
            'venue' => $request->input('venue'),
            'link' => $request->input('link'),
            'picture' => saveThumb($request),
        ];

        Event::create($event);

        return $this->cms_events();
    }

    //delete the event
    public function delete($id) {
      $event = Event::find($id);
      $event->delete(); //The event will be softDeleted
      return $this->cms_events();
    }

    //edit the event
    public function edit($id) {
      $event = Event::find($id);
      return view('cms.edit_event', [
        'event' => $event,
      ]);
    }

    public function cms_events() {
      $events = Event::orderBy('date', 'desc')->get();
      return view('cms.event', compact('events'));
    }

}
