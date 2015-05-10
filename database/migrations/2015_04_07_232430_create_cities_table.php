<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('cities', function(Blueprint $table)
        {
            $table->engine ='InnoDB';
            $table->increments('id');
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('states');
            $table->string('city_name',100);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cities');
	}

}
