<?php


use App\Http\Controllers\Api\Master\EventController as MasterEventController;
use App\Http\Controllers\Api\Master\ProfileController;
use App\Http\Controllers\Api\Master\ServiceController;

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\AuthToken\AuthController;
use App\Http\Controllers\GetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Auth::routes();
//Route::post('login', [UserController::class, 'login']);
//Route::post('register', [UserController::class, 'register']);
//Route::post('logout', [UserController::class, 'logout']);//->middleware('auth:sanctum');
Route::get('user', [UserController::class, 'getUser'])->middleware('auth:sanctum');

Route::group(['prefix' => 'services', 'middleware' => 'auth:sanctum'], function () {

    Route::get('/', [ServiceController::class, 'index']);
    Route::post('add', [ServiceController::class, 'add']);
    Route::get('edit/{id}', [ServiceController::class, 'edit']);
    Route::post('update/{id}', [ServiceController::class, 'update']);
    Route::delete('delete/{id}', [ServiceController::class, 'delete']);
});

Route::group(['prefix' => 'master','middleware' => 'auth:sanctum','as' => 'master.'], function () {
    Route::post('/events/oneday', [MasterEventController::class,'geteventsoneday']);
    Route::resource('/events', MasterEventController::class);
    Route::get('/profile', [ProfileController::class,'index'])->name('index');
    Route::post('/profile/update', [ProfileController::class,'update'])->name('update');
});





Route::middleware('auth:sanctum')->get('test', function () {
    return response()->json(['message' => 'Hello world']);
});

Route::middleware('auth:sanctum')->get('/users/{user}', function (Request $request) {
    return $request->user();
});







//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
