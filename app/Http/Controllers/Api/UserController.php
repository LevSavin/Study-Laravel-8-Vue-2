<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Register
     */
    public function register(Request $request)
    {

        try {
            $user = new User();
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->patronymic = $request->patronymic;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);

            $user->save();

            $success = true;
            $message = 'User register successfully';
        } catch (QueryException $ex) {

            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $success = true;
            $message = 'User login successfully';
        } else {
            $success = false;
            $message = 'Unauthorised';
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }

    /**
     * Logout
     */
    public function logout()
    {
        try {
            Session::flush();
            $success = true;
            $message = 'Successfully logged out';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }
}
