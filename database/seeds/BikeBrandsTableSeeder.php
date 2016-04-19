<?php

use Illuminate\Database\Seeder;

class BikeBrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bike_brands')->insert([
        		['name' => 'Shimano' ],
        		['name' => 'Giant' ],
        		['name' => 'Marin' ],
        		['name' => 'Specialized' ],
        		['name' => 'Trek' ],
        		['name' => 'Miele' ],
        		['name' => 'Diadora' ],
        		['name' => 'Fuji' ],
        		['name' => 'Felt' ]
        	]);
    }
}
