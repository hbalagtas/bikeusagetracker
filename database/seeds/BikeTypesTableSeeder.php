<?php

use Illuminate\Database\Seeder;

class BikeTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('bike_types')->insert([
        	['name'=>'Road Bike'],
        	['name'=>'Mountain Bike'],
        	['name'=>'TT Bike'],
        	['name'=>'Cross Bike'],
        	['name'=>'BSO']
        	]);
    }
}
