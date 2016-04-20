<?php

namespace BikeUsageTracker;

use Illuminate\Database\Eloquent\Model;

class BikeType extends Model
{
	public $timestamps = false;
	protected $fillable = ['name'];

    public function bikes()
    {
    	return $this->hasMany('BikeUsageTracker\Bike');
    }
}
