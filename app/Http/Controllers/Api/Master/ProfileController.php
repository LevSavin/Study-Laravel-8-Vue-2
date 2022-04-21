<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        //$user = Auth::user();
        $user = User::query()->select(User::$availableFields)->where('id', Auth::id())->first();

        $response = [
            'user' => $user
        ];
        return response()->json($response);
    }

    public function update(EditRequest $request){
        $fields = ($request->validated());
        $user = Auth::user();
        $user->update($fields);
        return response()->json('The user successfully updated');
    }
}
