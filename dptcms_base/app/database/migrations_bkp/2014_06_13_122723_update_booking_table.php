<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBookingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('booking', function(Blueprint $table)
		{
			//bookingreason
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
		Schema::table('booking', function(Blueprint $table)
		{
			//
			$table->dropColumn('timefrom');
			$table->dropColumn('timeto');
		});
	}

}
