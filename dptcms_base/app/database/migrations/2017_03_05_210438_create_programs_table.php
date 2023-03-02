<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProgramsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('programs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('program_name');
			$table->integer('program_total_sem');
			$table->integer('program_created_by');
			$table->timestamps();
			$table->text('overview', 65535);
			$table->text('otherdetails', 65535)->nullable();
			$table->text('selection', 65535);
			$table->text('strictureofprogram', 65535);
			$table->text('carrer', 65535);
			$table->integer('orderinmenu');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('programs');
	}

}
