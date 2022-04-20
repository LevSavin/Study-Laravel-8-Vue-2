<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Workday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with(['user','service'])->where('master_id',Auth::id())->orderBy('datetime', 'asc')->get();
        return response()->json(['events'=>$events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //получить записи к мастеру на выбранный день.
    public function geteventsoneday(Request $request ) {
        //dd($request);
        $day = $request->day;
        $master_id = Auth::id();

        $events = Event::with(['user','service'])->where('master_id',$master_id)
            ->whereDate('datetime',$day)
            ->orderBy('datetime', 'asc')->get();

        $worktime = Workday::where('master_id',$master_id)->where('date', $day)->first();
        return response()->json([
            'eventsoneday'=>$events,
            'worktime'=>$worktime
            ]);
    }
}
