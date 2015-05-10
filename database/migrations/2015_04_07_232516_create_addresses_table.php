<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function(Blueprint $table)
		{
            $table->engine ='InnoDB';
            $table->integer('address_id')->unsigned()->default(0);
            $table->primary('address_id');
            $table->foreign('address_id')->references('id')->on('properties');
            $table->string('street');
            $table->integer('number');
            $table->string('adjunct',60)->default('');
            $table->string('neighborhood');
            $table->integer('state')->unsigned();
            $table->foreign('state')->references('id')->on('states');
            $table->integer('city')->unsigned();
            $table->foreign('city')->references('id')->on('cities');
            $table->string('zipcode',15);
            $table->string('country')->default('Brasil');
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
		Schema::drop('addresses');
	}

}
