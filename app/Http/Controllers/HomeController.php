<?php

namespace BikeUsageTracker\Http\Controllers;

use BikeUsageTracker\Http\Requests;
use Iamstuartwilson\StravaApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Check if user has strava profile and update bikes after 30-60mins?
        $stravaprofile = Auth::user()->stravaprofile;
        if ( !is_null($stravaprofile) ){
            if ( $stravaprofile->updated_at->diffInMinutes() > 30 ){
                $api = new StravaApi;
                $api->setAccessToken($stravaprofile->access_token);
                $athlete = $api->get('/athletes/' . $stravaprofile->strava_id);
                $stravaprofile->strava_data = serialize($athlete);
                $stravaprofile->save();
                $stravaprofile->importstravabikes();
                \Log::info('Updated strava profile');
            } else {
                $interval = 30 - $stravaprofile->updated_at->diffInMinutes();
                \Log::info('Updating strava profile in '. $interval .' minutes');
            }
        }
        return view('home');
    }
}
