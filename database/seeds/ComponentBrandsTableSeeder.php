<?php

use Illuminate\Database\Seeder;

class ComponentBrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('component_brands')->insert([
        		['name' => 'Shimano'],
        		['name' => 'SRAM'],
        		['name' => 'Campagnolo'],
        		['name' => 'Avid'],
        		['name' => 'Brooks Saddle'],
        		['name' => 'Giro'],
        		['name' => 'KMC Chain'],
        		['name' => 'Schwalbe'],
        		['name' => 'SunTour']
        	]);
    }
}
