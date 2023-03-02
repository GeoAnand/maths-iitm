<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInPrograms extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('programs', function(Blueprint $table)
		{
			//
			$table->string('overview');
			$table->string('selection');
			$table->string('strictureofprogram');
			$table->string('carrer');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('programs', function(Blueprint $table)
		{
			//
			$table->dropColumn('overview');
			$table->dropColumn('selection');
			$table->dropColumn('strictureofprogram');
			$table->dropColumn('carrer');
		});
	}

}
