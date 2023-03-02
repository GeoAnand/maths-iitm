<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarouselTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carousel', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('carousel_image');
			$table->string('carousel_image_alt');
			$table->string('carousel_image_anytext');
			$table->integer('carousel_image_order');
			$table->integer('carousel_image_uploaded_by');
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
		Schema::drop('carousel');
	}

}
