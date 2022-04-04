<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Workday;
use Illuminate\Http\Request;

class WorkdayController extends Controller
{

    public function index()
    {

        return response()->json(Workday::all());

    }

    public function add(Request $request)
    {

        $workday = new Workday([
            'master_id' =>$request->master_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time'=>$request->end_time,
        ]);
        $workday->save();

        return response()->json('The workday successfully added');
    }

    public function edit($id)
    {
        $workday = Workday::find($id);
        return response()->json($workday);
    }

    public function update(Request $request, $id)
    {
        $workday = Workday::find($id);
        $workday->update($request->all());

        return response()->json('The workday successfully updated');
    }

    public function delete($id)
    {
        $workday = Workday::find($id);
        $workday->delete();

        return response()->json('The workday successfully deleted');
    }
}
