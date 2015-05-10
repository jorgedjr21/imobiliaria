<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('properties', function(Blueprint $table)
		{
            $table->engine ='InnoDB';
			$table->increments('id');
            $table->string('type',100);
            $table->integer('bedrooms')->default(0);
            $table->integer('kitchens')->default(0);
            $table->integer('bathrooms')->default(0);
            $table->integer('suiterooms')->default(0);
            $table->text('remark')->default('');
            $table->integer('pools')->default(0);
            $table->double('land_area')->default(0);
            $table->double('built_area')->default(0);
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
		Schema::drop('properties');
	}

}
