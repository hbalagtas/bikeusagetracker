<?php

use Illuminate\Database\Seeder;

class BikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $b = new Bike;
        $b->name = 'Orma';
        $b->notes = 'My birthday gift and the one that got me started into cycling';
        $b->weight = '20.5';
        $b->distance = '2800';
        $b->type()->associate( BikeType::find(2) );
        $b->brand()->associate( BikeBrand::find(3) );
        $b->user()->associate( User::find(1) );        
        $b->save();
    }
}
