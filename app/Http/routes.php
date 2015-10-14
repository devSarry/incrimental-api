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



Route::get('/', function() {
    return view('index');
});

//We add group prefix to make it easy to swap out the version if we ever
//want to "release" a new version. Or have 2 versions side by side.
Route::group(['prefix' => 'api/v1'], function() {
    Route::resource('lessons', LessonsController::class);

    /*Authentication route for testing JWT*/
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
});




