<?php

namespace BikeUsageTracker;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    public function bike()
    {
    	return $this->belongsTo('BikeUsageTracker\Bike');
    }
}
