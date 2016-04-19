<?php

namespace BikeUsageTracker;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    public function user()
    {
    	return $this->hasOne('BikeUsageTracker\User', 'id');
    }

    public function biketype()
    {
    	return $this->belongsTo('BikeUsageTracker\BikeType', 'bike_type_id');
    }
}
