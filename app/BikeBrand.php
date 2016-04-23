<?php

namespace BikeUsageTracker;

use Illuminate\Database\Eloquent\Model;

class BikeBrand extends Model
{
    public $timestamps = false;
	protected $fillable = ['name'];

    public function bikes()
    {
    	return $this->hasMany('BikeU sageTracker\Bike');
    }
}
