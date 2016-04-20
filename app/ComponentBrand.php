<?php

namespace BikeUsageTracker;

use Illuminate\Database\Eloquent\Model;

class ComponentBrand extends Model
{
    public $timestamps = false;
	protected $fillable = ['name'];

    public function components()
    {
    	return $this->hasMany('BikeUsageTracker\Component');
    }
}
