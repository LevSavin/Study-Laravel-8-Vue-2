<?php

use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\FreetimeController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Api\WorkdayController;
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


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'services', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [ServiceController::class, 'index']);
    Route::post('add', [ServiceController::class, 'add']);
    Route::get('edit/{id}', [ServiceController::class, 'edit']);
    Route::post('update/{id}', [ServiceController::class, 'update']);
    Route::delete('delete/{id}', [ServiceController::class, 'delete']);
    Route::get('show', [ServiceController::class, 'showAll']);
});

Route::group(['prefix' => 'clients'], function () {
    Route::get('/', [ClientController::class, 'index']);
    Route::post('add', [ClientController::class, 'add']);
    Route::get('edit/{id}', [ClientController::class, 'edit']);
    Route::post('update/{id}', [ClientController::class, 'update']);
    Route::delete('delete/{id}', [ClientController::class, 'delete']);
});

Route::group(['prefix' => 'events'], function () {
    Route::get('/', [EventController::class, 'index']);
    Route::post('add', [EventController::class, 'add']);
    Route::get('edit/{id}', [EventController::class, 'edit']);
    Route::post('update/{id}', [EventController::class, 'update']);
    Route::delete('delete/{id}', [EventController::class, 'delete']);
});

Route::group(['prefix' => 'workdays', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [WorkdayController::class, 'index']);
    Route::post('add', [WorkdayController::class, 'add']);
    Route::get('edit/{id}', [WorkdayController::class, 'edit']);
    Route::post('update/{id}', [WorkdayController::class, 'update']);
    Route::delete('delete/{id}', [WorkdayController::class, 'delete']);
});

Route::group(['prefix' => 'feetimes', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [FreetimeController::class, 'index']);
    Route::post('add', [FreetimeController::class, 'add']);
    Route::get('edit/{id}', [FreetimeController::class, 'edit']);
    Route::post('update/{id}', [FreetimeController::class, 'update']);
    Route::delete('delete/{id}', [FreetimeController::class, 'delete']);
});



//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
