<?php

use Illuminate\Http\Request;

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


/*
|--------------------------------------------------------------------------
| My API Routes
|--------------------------------------------------------------------------
*/

Route::get('/status', 'Api\ComentarioController@status');

Route::namespace('Api')->group(function(){
    //Create
    Route::post('comentarios/add', 'ComentarioController@add');

    //Select All
    Route::get('comentarios', 'ComentarioController@list');
    
    //Select
    Route::get('comentarios/{id}', 'ComentarioController@select');

    //Update
    Route::put('comentarios/{id}', 'ComentarioController@update');
});

Route::namespace('Api')->group(function(){
    //Create
    Route::post('users/add', 'UserController@add');

    //Select All
    Route::get('users', 'UserController@list');
    
    //Select
    Route::get('users/{id}', 'UserController@select');

    //Update
    Route::put('users/{id}', 'UserController@update');
});