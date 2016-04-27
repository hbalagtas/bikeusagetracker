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

Route::auth();

Route::group(['middleware' => ['auth','web']], function () {
	Route::resource('biketype', 'BikeTypeController');
	Route::resource('bikes', 'BikeController');

	Route::get('select-components/{bike_id}', function($bike_id){		
		$bike = Bike::findOrFail($bike_id);
		$componenttypes = ComponentType::all();
		return view('select-components', compact('bike', 'componenttypes'));
	});
	Route::post('select-components', function () {

	});
});

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('authorize', ['as' =>'authorize_strava', 'uses' => 'StravaProfileController@authorizestrava']);
