<?php

namespace BikeUsageTracker;

use Illuminate\Database\Eloquent\Model;

class StravaProfile extends Model
{
    protected $fillable = ['user_id', 'strava_id', 'strava_data'];

    public function user()
    {
    	return $this->belongsTo('BikeUsageTracker\User');
    }
}
