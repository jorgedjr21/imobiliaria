<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('prop_images',function(Blueprint $table){
            $table->increments('id');
            $table->integer('property_id')->unsigned()->default(0);
            $table->foreign('property_id')->references('id')->on('properties');
            $table->string('path');
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prop_images');
	}

}
