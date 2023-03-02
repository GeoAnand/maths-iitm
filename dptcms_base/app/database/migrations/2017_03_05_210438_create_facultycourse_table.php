<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacultycourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facultycourse', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('course_name', 100);
			$table->text('course_desc', 65535);
			$table->string('course_link');
			$table->integer('added_by');
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
		Schema::drop('facultycourse');
	}

}
