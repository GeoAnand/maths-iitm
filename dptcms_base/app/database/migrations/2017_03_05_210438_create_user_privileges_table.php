<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->integer('people')->default(0);
			$table->integer('student')->default(0);
			$table->integer('research')->default(0);
			$table->integer('programs')->default(0);
			$table->integer('events')->default(1);
			$table->integer('resources')->default(1);
			$table->integer('newannouncement')->default(0);
			$table->integer('createadmin')->default(0);
			$table->timestamps();
			$table->integer('bookings')->default(0);
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
