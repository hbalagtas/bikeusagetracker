<?php

namespace BikeUsageTracker;

use Illuminate\Database\Eloquent\Model;

class BikeType extends Model
{
	public $timestamps = false;

    public function bikes()
    {
    	return $this->hasMany('BikeUsageTracker\Bike');
    }
}
