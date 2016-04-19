<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BikeTypesTableSeeder::class);
        $this->call(ComponentTypesSeeder::class);
        $this->call(BikeBrandsTableSeeder::class);
        $this->call(ComponentBrandsTableSeeder::class);
    }
}
