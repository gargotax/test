<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/test22', function (Request $request){
   return \App\Models\User::first();
});

Route::post('message',[Controller::class, "storeMessage"]);

Route::get('message', [Controller::class, "getMessage"]);

Route::delete('message/{message_id}', [Controller::class, "deleteMessage"]);

Route::put('message/', [Controller::class, "updateMessage"]);
