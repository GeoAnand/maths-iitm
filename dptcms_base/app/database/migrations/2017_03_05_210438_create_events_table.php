<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('events_name');
			$table->text('events_desc', 65535);
			$table->date('events_date');       // edited string->date
			$table->date('events_end_date');   // same as above NARAYANAN
			$table->integer('events_type_id');
			$table->integer('events_show_in_menu');
			$table->integer('events_archive');
			$table->integer('events_created_by');
			$table->timestamps();
			$table->string('externallink');
			$table->integer('publish');
			$table->string('mainspeaker');
			$table->string('posterimage')->nullable();
			$table->integer('needpage');
			$table->string('events_place');
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
		Schema::drop('events');
	}

}
