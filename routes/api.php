<?php

use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TimetableController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WorkerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WaybillController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/waybills/create', [WaybillController::class, 'create']);
Route::post('/waybills', [WaybillController::class, 'store']);
Route::get('/waybills/{number}', [WaybillController::class, 'show']);
Route::resource('/timetable', TimetableController::class);
Route::resource('/services', ServiceController::class);
Route::resource('/users', UserController::class);
Route::resource('/workers', WorkerController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
