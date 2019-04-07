<?php

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return response()->json(new UserResource($request->user()));
});
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::post('change-status','UserController@changeStatus')->middleware('auth:api');
