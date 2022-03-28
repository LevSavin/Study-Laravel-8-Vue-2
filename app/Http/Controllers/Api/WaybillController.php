<?php

namespace App\Http\Controllers\Api;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\Worktime;
use Carbon\Carbon;
use App\Models\Master;
use App\Models\Sender;
use App\Models\Status;
use App\Models\Waybill;
use App\Models\Receiver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WaybillController  extends Controller
{

    public function create()
    {
        return [
            'worktimes' => Worktime::all(),
            'occupiedtimes' => Appointment::query()->select('time_id')->get(),
            'services' => Service::all(),
//            'receivers' => Receiver::all(),
//            'senders'   => Sender::all(),
        ];
    }

    public function store(Request $request)
    {
        return ['message' => 'Данные получены'];
//
//        $master = Master::firstOrCreate([
//            'number' => $request['master.number']
//        ]);
//
//        $sender = Sender::firstOrCreate(
//            ['id'   => $request['sender.id']],
//            ['name' => $request['sender.name']]
//        );
//
//        $receiver = Receiver::firstOrCreate(
//            ['id' => $request['receiver.id']],
//            [
//                'name' => $request['receiver.name'],
//                'inn' => $request['receiver.inn'],
//                'kpp' => $request['receiver.kpp']
//            ]
//        );
//
//        $waybill = Waybill::firstOrCreate(
//            ['number' => $request['waybill.number']],
//            [
//                'master_id' => $master->id,
//                'receiver_id' => $receiver->id,
//                'sender_id' => $sender->id,
//            ]
//        );
//
//        // Очищаем незаполненные статусы
//        $statuses = $this->clearEmpty($request['statuses']);
//
//        foreach ($statuses as $id => $values) {
//            $waybill->statuses()->attach($id, [
//                'datetime' => $this->getDateTime($values['date'], $values['time'])
//            ]);
//        }
//
//        $waybill->update(['status_id' => array_key_last($statuses)]);
//
//        return ['message' => 'Накладная успешно сохранена'];
    }

    public function show(string $number)
    {
        $waybill = Waybill::with(['master', 'receiver', 'sender', 'statuses'])
            ->where('number', $number)
            ->first();

        $statuses = Status::all()->pluck('name', 'id')->toArray();

        if (!$waybill) abort(404);

        return ['statuses' => $statuses, 'waybill' => $waybill];
    }

    private function clearEmpty(array $statuses): array
    {
        foreach ($statuses as $id => $values) {
            // Если время в форме не задано - писать текущее, потому что это итак очевидно (нет)
            if (is_null($values['time'])) {
                $statuses[$id]['time'] = Carbon::now()->format('H:i:s');
            }

            if (is_null($values['date'])) {
                unset($statuses[$id]);
            }
        }

        return $statuses;
    }

    private function getDateTime($date, $time): Carbon
    {
        return Carbon::parse($date . ' ' . $time);
    }
}
