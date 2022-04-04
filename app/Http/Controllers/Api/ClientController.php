<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index(Request $request)
    {
        return response(Client::all());
    }


    public function add(Request $request)
    {
        $client = new Client([
            'firstname' => $request->firstname,
            'phone' => $request->phone
        ]);
        $client->save();

        return response()->json('The client successfully added');
    }


    public function edit($id)
    {
        $client = Client::find($id);
        return response()->json($client);
    }


    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->update($request->all());

        return response()->json('The client successfully updated');
    }


    public function delete($id)
    {
        $client = Client::find($id);
        $client->delete();

        return response()->json('The client successfully deleted');
    }
}
