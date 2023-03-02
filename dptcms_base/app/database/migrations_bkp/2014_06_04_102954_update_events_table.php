<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('events', function(Blueprint $table)
		{
			//
			$table->string('mainspeaker');
			$table->text('anyguest');
			$table->string('posterimage');

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
			//
			$table->dropColumn('mainspeaker');
			$table->dropColumn('anyguest');
			$table->dropColumn('posterimage');
		});
	}

}
