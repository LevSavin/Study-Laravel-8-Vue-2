<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Freetime;
use Illuminate\Http\Request;

class FreetimeController extends Controller
{
    public function index()
    {

        return response()->json(Freetime::all());

    }

    public function add(Request $request)
    {

        $freeTime = new Freetime([
            'master_id' =>$request->master_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time'=>$request->end_time,
        ]);
        $freeTime->save();

        return response()->json('The Free time successfully added');
    }

    public function edit($id)
    {
        $freeTime = Freetime::find($id);
        return response()->json($freeTime);
    }

    public function update(Request $request, $id)
    {
        $freeTime = Freetime::find($id);
        $freeTime->update($request->all());

        return response()->json('The Free time successfully updated');
    }

    public function delete($id)
    {
        $freeTime = Freetime::find($id);
        $freeTime->delete();

        return response()->json('The Free time successfully deleted');
    }
}
