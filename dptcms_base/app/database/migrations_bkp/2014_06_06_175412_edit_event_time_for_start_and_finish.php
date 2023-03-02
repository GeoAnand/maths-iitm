<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditEventTimeForStartAndFinish extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('events', function(Blueprint $table)
		{
			$table->dropColumn('events_time');
			$table->string('events_starttime');
			$table->string('events_endtime');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('events', function(Blueprint $table)
		{
			$table->string('events_time');
			$table->dropColumn('events_starttime');
			$table->dropColumn('events_endtime');
		});
	}

}
