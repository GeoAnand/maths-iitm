<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReplaceOtherDetailWithLinkInPublications extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('publications', function(Blueprint $table)
		{
			$table->dropColumn('publications_other_details');
			$table->string('publications_link');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('publications', function(Blueprint $table)
		{
			$table->string('publications_other_details');
			$table->dropColumn('publications_link');
		});
	}

}
