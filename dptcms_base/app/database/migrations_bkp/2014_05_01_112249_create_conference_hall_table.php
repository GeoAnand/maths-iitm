<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConferenceHallTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conference_hall', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('conference_halls_name');
			$table->string('conference_halls_details');
			$table->string('conference_halls_incharge');
			$table->string('conference_halls_contact');
			$table->integer('conference_halls_is_free');
			$table->string('conference_halls_next_available_date');
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
		Schema::drop('conference_hall');
	}

}
