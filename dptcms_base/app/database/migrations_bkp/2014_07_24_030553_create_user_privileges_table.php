<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPrivilegesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_privileges', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('people');
			$table->integer('student');
			$table->integer('research');
			$table->integer('programs');
			$table->integer('events');
			$table->integer('resources');
			$table->integer('newannouncement');
			$table->integer('createadmin');
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
		Schema::drop('user_privileges');
	}

}
