<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index(Request $request)
    {
        return response()->json(Event::all());
    }


    public function add(Request $request)
    {
        $event = new Event([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'service_id' => $request->service_id,
            'datetime' => $request->datetime
        ]);
        $event->save();

        return response()->json('The event successfully added');
    }


    public function edit($id)
    {
        $event = Event::find($id);
        return response()->json($event);
    }


    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->update($request->all());

        return response()->json('The event successfully updated');
    }


    public function delete($id)
    {
        $event = Event::find($id);
        $event->delete();

        return response()->json('The event successfully deleted');
    }
}
