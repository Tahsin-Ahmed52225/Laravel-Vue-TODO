<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/todos', 'TodoController@index');
Route::prefix('/todo')->group(function(){
    Route::post('/create', 'TodoController@create');
    Route::get('/show/{id}', 'TodoController@show');
    Route::put('/update/{id}', 'TodoController@update');
    Route::delete('/delete/{id}', 'TodoController@destroy');
});
