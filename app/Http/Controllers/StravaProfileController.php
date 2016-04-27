<?php

namespace BikeUsageTracker\Http\Controllers;

use BikeUsageTracker\Http\Requests;
use BikeUsageTracker\StravaProfile;
use BikeUsageTracker\User;
use Iamstuartwilson\StravaApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StravaProfileController extends Controller
{
    public function authorizestrava(Request $request)
    {
        #$code = Input::get('code');
        $code = $request->get('code');
        $clientId = env('STRAVA_CLIENT_ID');
        $clientSecret = env('STRAVA_CLIENT_SECRET');
        
        $api = \Cache::get('stravaapi', new StravaApi(
            $clientId,
            $clientSecret
        ));
        $response = $api->tokenExchange($code);
        $accessToken = $response->access_token;
        $athlete = $response->athlete;

        $user = User::firstOrCreate([
            'name' => $athlete->firstname . ' ' . $athlete->lastname,
            'email' => $athlete->email
            
            ]); 
        
        if ($athlete->measurement_preference == 'meters' ){
            $user->unit = 'km';
        } else {
            $user->unit = 'mi';
        }
        $user->save();

        if ( is_null( $user->stravaprofile ) ){
            $strava_profile = new \StravaProfile;
            $strava_profile->strava_id = $athlete->id;
            $strava_profile->access_token = $accessToken;
            $strava_profile->strava_data = serialize($response->athlete);
            $strava_profile->save();
            $user->stravaprofile()->save($strava_profile);      
            $strava_profile->importstravabikes();
        }   

        Auth::login($user); 
        
        return redirect()->route('home');
    }
}
