<?php

namespace BikeUsageTracker;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
	protected $fillable = ['bike_id', 'user_id', 'component_type_id', 'component_brand_id', 'model', 'notes', 'distance'];

    public function type()
    {
    	return $this->belongsTo('BikeUsageTracker\ComponentType', 'component_type_id');
    }

    public function brand()
    {
    	return $this->belongsTo('BikeUsageTracker\ComponentBrand', 'component_brand_id');
    }

    public function bike()
    {
    	return $this->belongsTo('BikeUsageTracker\Bike', 'bike_id');
    }

    public function user()
    {
    	return $this->belongsTo('BikeUsageTracker\User', 'user_id');
    }
}
