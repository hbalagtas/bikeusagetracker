<?php

namespace BikeUsageTracker;

use Iamstuartwilson\StravaApi;
use Illuminate\Database\Eloquent\Model;

class StravaProfile extends Model
{
	protected $strava_api;

    protected $fillable = ['user_id', 'strava_id', 'strava_data'];

    public function __construct()
    {
    	$this->strava_api = new StravaApi(env('STRAVA_CLIENT_ID'), env('STRAVA_CLIENT_SECRET'));
    }
    public function user()
    {
    	return $this->belongsTo('BikeUsageTracker\User');
    }

    public function importbikes()
    {
    	$data = unserialize($this->strava_data);
    	foreach($data->athlete->bikes as $bike){
    		if ( Bike::where('strava_bike_id', $bike->id)->count() == 0){
    			$b = new Bike;
    			$b->strava_bike_id = $bike->id;
    			$b->name = $bike->name;
    			$b->distance = $bike->distance * 0.001;
    			$this->user->bikes()->save($b);
    		}    		
    	}
    	return $data->athlete->bikes;
    }
}
