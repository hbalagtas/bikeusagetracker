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
});


Route::get('/home', 'HomeController@index');

Route::get('/strava-test', function(){
	
});

Route::get('authorize', function(){
	$code = Input::get('code');
	$clientId = env('STRAVA_CLIENT_ID');
	$clientSecret = env('STRAVA_CLIENT_SECRET');
	
	$api = \Cache::get('stravaapi', new StravaApi(
	    $clientId,
	    $clientSecret
	));
	$response = $api->tokenExchange($code);
	$accessToken = $response->access_token;
	$athlete = $response->athlete;

	/*$api->setAccessToken($accessToken);
	$athlete = $api->get('athlete');
	*/
	$user = User::firstOrNew([
		'name' => $athlete->firstname . ' ' . $athlete->lastname,
		'email' => $athlete->email,
		'unit' => 'km',
		'strava_access_token' => $accessToken
		]);
	$user->save();

	Auth::login($user);

	return view('home');

	\Cache::forget('stravaapi');
	\Cache::put('stravaapi', $api, 50000);
	var_dump($accessToken);
	
	var_dump($athlete);
});

Route::get('strava', function(){
	\Cache::forget('stravaapi');
	$clientId = env('STRAVA_CLIENT_ID');
	$clientSecret = env('STRAVA_CLIENT_SECRET');
	$api = new StravaApi(
	    $clientId,
	    $clientSecret
	);
	\Cache::put('stravaapi', $api, 50000);
	$redirect = 'http://strava.app/authorize';
	$url = $api->authenticationUrl($redirect, $approvalPrompt = 'auto', $scope = null, $state = null);
	echo "<a href='{$url}'>Log in using Strava</a>";
});
