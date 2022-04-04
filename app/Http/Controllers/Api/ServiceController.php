<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::query()->where('user_id',Auth::id())->get()->toArray();
        return array_reverse($services);

    }

    public function add(Request $request)
    {

        $service = new Service([
            'user_id'=>Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'price'=>$request->price,
        ]);
        $service->save();

        return response()->json('The service successfully added');
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return response()->json($service);
    }

    public function update(Request $request, $id)
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

    public function showAll(Request $request)
    {
        return response(Service::all());
    }

}
