<?php

namespace App\Http\Controllers;

use App\Event;
use App\Religion;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        return $this->middleware("auth");
    }
    public function createList() {
        return view("events.create-list");
    }
    public function edit($id) {
        $religions = Religion::pluck("name","id");
        $event = Event::findOrFail($id);
        return view("events.edit",compact("event","religions"));
    }

    // store events
    public function store(Request $request) {
        $request->validate([
            "title" => "bail|required|max:190|string",
            "message" => "bail|required|max:10000|string",
            "date" => "bail|required|date",
            "religion_id" => "bail|required"
        ]);

        $add = Event::create($request->all());
        if($add) {
            return back()->with(["eventsAddSuccess"=>"New Event Created!"]);
        }
    }

    // update events
    public function update(Request $request, $id) {
        $request->validate([
            "title" => "bail|required|max:190|string",
            "message" => "bail|required|max:10000|string",
            "date" => "bail|required|date",
            "religion_id" => "bail|required"
        ]);

        $event = Event::findOrFail($id);
        $request['status'] = 0;
        $update = $event->update($request->all());

        if($update) {
            return back()->with(["eventsUpdateSuccess"=>"Event Updated!"]);
        }
    }

    // delete events
    public function delete(Request $request) {
        $event = Event::findOrFail($request->id);
        $delete= $event->delete();
        if($delete) {
            return response()->json(["eventDeleteSucess"=>"Event Deleted!"]);
        }
    }
}
