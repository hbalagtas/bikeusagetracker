<?php

namespace BikeUsageTracker;

use Iamstuartwilson\StravaApi;
use Illuminate\Database\Eloquent\Model;

class StravaProfile extends Model
{
	public $strava_api;

    protected $fillable = ['user_id', 'strava_id', 'strava_data', 'access_token'];

    public function __construct()
    {
    	$this->strava_api = new StravaApi(env('STRAVA_CLIENT_ID'), env('STRAVA_CLIENT_SECRET'));
    }

    public function user()
    {
    	return $this->belongsTo('BikeUsageTracker\User');
    }

    public function importbikes()
    {
    	$data = unserialize($this->strava_data);
    	foreach($data->bikes as $bike){
    		if ( Bike::where('strava_bike_id', $bike->id)->count() == 0){
    			$b = new Bike;
    			$b->strava_bike_id = $bike->id;
    			$b->name = $bike->name;
    			$b->distance = $bike->distance * 0.001;

                $api = $this->strava_api;
                $api->setAccessToken($this->access_token);

                $bike_info = $api->get('/gear/' . $b->strava_bike_id);
                $b->notes = $bike_info->description;
                $b->model = $bike_info->model_name;
                $b->private = true;
                $brand = BikeBrand::firstOrCreate(['name' => ucwords($bike_info->brand_name)]);
                $b->brand()->associate($brand);                
                //1 -> mtb, 2 -> cross, 3 -> road, 4 -> time trial
                switch ($bike_info->frame_type) {
                    case 1:
                        $b->type()->associate(BikeType::find(2));
                        break;
                    case 2:
                        $b->type()->associate(BikeType::find(4));
                        break;
                    case 3:
                        $b->type()->associate(BikeType::find(1));
                        break;
                    case 4:
                        $b->type()->associate(BikeType::find(3));
                        break;
                    default:
                        $b->type()->associate(BikeType::find(5));
                        break;
                }
    			$this->user->bikes()->save($b);
    		}    		
    	}
    	return $data->bikes;
    }
}
