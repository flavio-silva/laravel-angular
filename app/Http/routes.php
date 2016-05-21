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

Route::post('oauth', function () {
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['middleware' => 'oauth'], function() {

    Route::group(['prefix' => 'clients'], function() {
        Route::get('', 'ClientController@index');
        Route::post('', 'ClientController@store');
        Route::get('{id}', 'ClientController@show');
        Route::put('{id}', 'ClientController@update');
        Route::delete('{id}', 'ClientController@destroy');
    });

    Route::group(['prefix' => 'projects'], function() {

            Route::post('', 'ProjectController@store');

            Route::group(['middleware' => 'check-permission'], function() {

            Route::get('', 'ProjectController@index');
            Route::get('{id}', 'ProjectController@show');
            Route::put('{id}', 'ProjectController@update');
            Route::delete('{id}', 'ProjectController@destroy');
            Route::get('member', 'ProjectController@showMembers');
            
                Route::group(['prefix' => '{project_id}'], function() {

                    Route::group(['prefix' => 'task'], function() {

                        Route::get('', 'ProjectTaskController@index');
                        Route::post('', 'ProjectTaskController@store');
                        Route::get('{id}', 'ProjectTaskController@show');
                        Route::put('{id}', 'ProjectTaskController@update');
                        Route::delete('{id}', 'ProjectTaskController@destroy');
                    });
                    Route::group(['prefix' => 'note'], function() {

                        Route::get('', 'ProjectNoteController@index');
                        Route::post('', 'ProjectNoteController@store');
                        Route::get('{id}', 'ProjectNoteController@show');
                        Route::put('{id}', 'ProjectNoteController@update');
                        Route::delete('{id}', 'ProjectNoteController@destroy');
                    });
                });
            });
    });
});