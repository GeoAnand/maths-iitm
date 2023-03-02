<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('student_name');
			$table->string('student_rollno');
			$table->string('student_guide_name')->nullable();
			$table->integer('student_program_id');
			$table->integer('student_year');
			$table->integer('student_added_by');
			$table->timestamps();
			$table->string('temp')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('students');
	}

}
