<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnAddedByInBookpublished extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bookpublished', function(Blueprint $table)
		{
			//
			$table->integer('added_by');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bookpublished', function(Blueprint $table)
		{
			//
			$table->dropColumn('added_by');
		});
	}

}
