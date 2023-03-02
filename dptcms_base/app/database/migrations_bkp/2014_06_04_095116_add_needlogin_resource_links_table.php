<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNeedloginResourceLinksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('resource_links', function(Blueprint $table)
		{
			//
			$table->integer('needlogin');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('resource_links', function(Blueprint $table)
		{
			//
			$table->dropColumn('needlogin');
		});
	}

}
