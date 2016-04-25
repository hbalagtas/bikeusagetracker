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

	$user = User::firstOrNew([
		'name' => $athlete->firstname . ' ' . $athlete->lastname,
		'email' => $athlete->email,
		'unit' => 'km'
		]);
	$user->save();
	if ( is_null( $user->stravaprofile ) ){
		$strava_profile = new BikeUsageTracker\StravaProfile;
		$strava_profile->strava_id = $athlete->id;
		$strava_profile->access_token = $accessToken;
		$strava_profile->strava_data = serialize($response);
		$strava_profile->save();
		$user->stravaprofile()->save($strava_profile);
		$user->stravaprofile()->importbikes();
	}	

	Auth::login($user);
	return view('home');
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
