<?php

namespace BikeUsageTracker;

use Illuminate\Database\Eloquent\Model;

class ComponentType extends Model
{
    public $timestamps = false;
	protected $fillable = ['name'];

    public function components()
    {
    	return $this->hasMany('BikeUsageTracker\Component');
    }
}
