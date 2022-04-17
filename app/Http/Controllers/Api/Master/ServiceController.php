<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {

        //$services = Service::all()->toArray();
        //$services = Service::query()->where('user_id',Auth::id())->get()->toArray();
        $services = Service::where('user_id',Auth::id())->get();

        $user = User::where('id',Auth::id())->get();
        //return array_reverse($services);
        $response = [
            'services' => $services,
            'user'=>$user,
        ];
       return response()->json($response);
    }

    public function add(Request $request)
    {

        $service = new Service([
            'name' => $request->name,
            'description' => $request->description,
            //'user_id'=>$request->user_id,
            'user_id'=>Auth::id(),
            'price'=>$request->price,
            'interval'=>$request->interval,
        ]);
        $service->save();

        return response()->json('The service successfully added');
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return response()->json($service);
    }

    public function update($id, Request $request)
    {
        $service = Service::find($id);
        $service->update($request->all());

        return response()->json('The service successfully updated');
    }

    public function delete($id)
    {
        $service = Service::find($id);
        $service->delete();

        return response()->json('The service successfully deleted');
    }
}
