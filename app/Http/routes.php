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

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::get('/', function () {
    return view('welcome');
});

//Route::auth();

Route::group(['middleware' => ['auth','web']], function () {
	Route::resource('biketype', 'BikeTypeController');
	Route::resource('bikes', 'BikeController');
});


Route::get('/home', 'HomeController@index');
