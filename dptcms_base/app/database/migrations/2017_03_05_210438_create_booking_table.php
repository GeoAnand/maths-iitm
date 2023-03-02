<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('booking', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('booking_user_id');
			$table->string('booking_reasone');
			$table->integer('booking_hall_id');
			$table->string('booking_hall_from');
			$table->string('booking_hall_to', 20)->nullable();
			$table->timestamps();
			$table->string('booking_status', 11);
			$table->string('timefrom');
			$table->string('timeto');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('booking');
	}

}
