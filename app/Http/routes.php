<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'clients'], function() {
    Route::get('', 'ClientController@index');
    Route::post('', 'ClientController@store');
    Route::get('{id}', 'ClientController@show');
    Route::delete('{id}', 'ClientController@destroy');
    Route::put('{id}', 'ClientController@update');
});

Route::group(['prefix' => 'projects'], function() {
    Route::get('{id}/note', 'ProjectNoteController@index');
    Route::post('{id}/note', 'ProjectNoteController@store');
    Route::get('{id}/note/{noteId}', 'ProjectNoteController@show');
    Route::put('{id}/note/{noteId}', 'ProjectNoteController@update');
    Route::delete('{id}/note/{noteId}', 'ProjectNoteController@destroy');
    
    Route::get('{id}/task', 'ProjectTaskController@index');
    Route::post('task', 'ProjectTaskController@store');
    Route::get('{id}/task/{taskId}', 'ProjectTaskController@show');
    Route::put('{id}/task/{taskId}', 'ProjectTaskController@update');
    Route::delete('{id}/task/{taskId}', 'ProjectTaskController@destroy');

    Route::get('{id}/member', 'ProjectController@showMembers');

    Route::get('', 'ProjectController@index');
    Route::post('', 'ProjectController@store');
    Route::get('{id}', 'ProjectController@show');
    Route::delete('{id}', 'ProjectController@destroy');
    Route::put('{id}', 'ProjectController@update');
});

