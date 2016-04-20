<?php

namespace BikeUsageTracker;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $fillable = ['user_id', 'bike_type_id', 'bike_brand_id', 'name', 'notes', 'weight', 'distance'];
    public function user()
    {
    	return $this->belongsTo('BikeUsageTracker\User', 'user_id');
    }

    public function type()
    {
    	return $this->belongsTo('BikeUsageTracker\BikeType', 'bike_type_id');
    }

    public function brand()
    {
        return $this->belongsTo('BikeUsageTracker\BikeType', 'bike_brand_id');
    }

    public function components()
    {
    	return $this->hasMany('BikeUsageTracker\Component');
    }
}
