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

Route::get('clients', 'ClientController@index');
Route::post('clients', 'ClientController@store');
Route::get('clients/{id}', 'ClientController@show');
Route::delete('clients/{id}', 'ClientController@destroy');
Route::put('clients/{id}', 'ClientController@update');

Route::get('projects', 'ProjectController@index');
Route::post('projects', 'ProjectController@store');
Route::get('projects/{id}', 'ProjectController@show');
Route::delete('projects/{id}', 'ProjectController@destroy');
Route::put('projects/{id}', 'ProjectController@update');

