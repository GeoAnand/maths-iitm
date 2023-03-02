<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('user_type',20);
			$table->string('user_fname',50);
			$table->string('user_lname',50);
			$table->string('user_email',50);
			$table->string('password');
			$table->integer('user_active');
			$table->string('user_office',20);
			$table->string('user_phone');
			$table->string('user_researchfield');
			$table->string('user_designation');
			$table->string('user_lab_office_stores');
			$table->string('user_namehandle',50);
			$table->string('user_profilepics');
			$table->string('remember_token');
			$table->string('user_sex',10);
			$table->string('user_dob',10);
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
		Schema::drop('users');
	}

}
