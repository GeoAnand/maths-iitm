<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('course_no');
			$table->string('course_name');
			$table->string('course_credit');
			$table->string('course_program_id');
			$table->string('course_sem');
			$table->integer('course_year');
			$table->text('course_details', 65535);
			$table->integer('course_added_by');
			$table->timestamps();
			$table->text('courser_reference', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('course');
	}

}
