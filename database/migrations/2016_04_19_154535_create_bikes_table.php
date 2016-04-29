<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('strava_bike_id')->index();
            $table->integer('user_id')->references('id')->on('users')->onDelete('cascade')->index();  
            $table->integer('bike_type_id')->references('id')->on('bike_types')->index();
            $table->integer('bike_brand_id')->references('id')->on('bike_brands')->index();
            $table->string('name');            
            $table->string('model');
            $table->longtext('notes');
            $table->decimal('weight', 4, 2);            
            $table->decimal('distance', 10, 2);
            $table->boolean('private');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bikes');
    }
}
