<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bike_id')->references('id')->on('bikes')->index();  
            $table->integer('user_id')->references('id')->on('users')->onDelete('cascade')->index();            
            $table->integer('component_type_id')->references('id')->on('component_types')->index();
            $table->integer('component_brand_id')->references('id')->on('component_brands')->index();            
            $table->string('model');           
            $table->longtext('notes'); 
            $table->decimal('distance', 10, 2);
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
        Schema::drop('components');
    }
}
