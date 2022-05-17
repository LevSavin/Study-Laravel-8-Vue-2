<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\CreateRequest;
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
     * @param CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        //TODO добавить логику проверки свободного рабочего времени
        $datetime = $request->datetime;
        list($date, $time)=explode(' ', $datetime);
        //есть ли такой рабочий день, входит ли выбранное время в рабочий интервал
        if ($worktime = Workday::query()->where('date', $date)
            ->where('master_id', Auth::id())
            ->where('start_time','<=', $time)
            ->where('end_time','>=', $time)
            ->exists()){
            //проверим не занято ли это время
            if($events = Event::query()->where('master_id',Auth::id())
                    ->where('datetime', $datetime)
                    ->exists()
            ){
              return response()->json(['error'=>'Время занято', 'worktime' => $worktime, 'events'=>$events]);
            } else {
                $created = Event::create($request->validated() +
                    ['master_id' =>Auth::id()]
                );
                if($created){
                    return response()->json(['success'=>'Запись добавлена', 'worktime' => $worktime]);
                }
            }

        };


        return response()->json(['error'=>'Мастер в это время не рабтает', 'worktime' => $worktime, 'events'=>$events]);

        //return response()->json(['error'=>'Не удалось добавить запись']);


        //return response()->json(['req'=>$request->all()]);
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
        //TODO add EditRequest
        $event = Event::find($id);
        $event->update($request->all());
        return response()->json('The event successfully updated');

        //return response()->json(['message'=>$request]);
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
