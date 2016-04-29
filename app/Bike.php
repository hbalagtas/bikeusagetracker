<?php

namespace BikeUsageTracker;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $fillable = ['user_id', 'bike_type_id', 'bike_brand_id', 'name', 'model', 'notes', 'weight', 'distance', 'private'];
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
        return $this->belongsTo('BikeUsageTracker\BikeBrand', 'bike_brand_id');
    }

    public function components()
    {
    	return $this->hasMany('BikeUsageTracker\Component', 'bike_id');
    }

    public function componenttypes()
    {
        return $this->hasManyThrough('BikeUsageTracker\ComponentType', 'BikeUsageTracker\Component');
    }
}
