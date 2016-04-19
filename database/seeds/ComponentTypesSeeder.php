<?php

use Illuminate\Database\Seeder;

class ComponentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('component_types')->insert([
        	['name'=>"Chain"],
        	['name'=>"Front Wheel"],
        	['name'=>"Rear Wheel"],
        	['name'=>"Fork"],
        	['name'=>"Handlebar"],
        	['name'=>"Pedals"],
        	['name'=>"Front Tire"],
        	['name'=>"Rear Tire"],
        	['name'=>"Bottom Bracket"],
        	['name'=>"Front Brake"],
        	['name'=>"Rear Brake"],
        	['name'=>"Front Brake Pads"],
        	['name'=>"Rear Brake Pads"],
        	['name'=>"Front Brake Lever"],
        	['name'=>"Rear Brake Lever"],
        	['name'=>"Cassette"],
        	['name'=>"Chainrings"],
        	['name'=>"Crankset"],
        	['name'=>"Front Derailleur"],
        	['name'=>"Rear Derailleur"],
        	['name'=>"Headset"],
        	['name'=>"Saddle"],
        	['name'=>"Seatpost"],
        	['name'=>"Stem"],
        	['name'=>"Front Brake Cable"],
        	['name'=>"Rear Brake Cable"],
        	['name'=>"Front Shifter Cable"],
        	['name'=>"Rear Shifter Cable"],
        	['name'=>"Shift Levers"],
        	['name'=>"Front Shock"],
        	['name'=>"Rear Shock"],
        	['name'=>"Front Brake Rotor"],
        	['name'=>"Rear Brake Rotor"]
        	]);
    }
}
