<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->string('username');
			$table->string('user_type', 50);
			$table->string('user_fname', 50);
			$table->string('user_lname', 50);
			$table->string('user_email', 50);
			$table->string('password');
			$table->integer('user_active');
			$table->text('user_office', 65535);
			$table->string('user_phone');
			$table->text('user_researchfield', 65535);
			$table->string('user_designation');
			$table->string('user_lab_office_stores');
			$table->string('user_personal_homepage')->nullable();
			$table->string('user_namehandle', 50);
			$table->string('user_profilepics');
			$table->text('user_cv', 65535);
			$table->string('remember_token')->nullable();
			$table->string('user_sex', 10)->nullable();
			$table->string('user_dob', 10)->nullable();
			$table->timestamps();
			$table->string('user_title', 10);
			$table->integer('isadmin');
			$table->string('ingroup')->nullable();
			$table->integer('issuper')->nullable();
			$table->string('user_subtype', 100)->default('default');
			$table->boolean('user_subtype_sort')->default(0);
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
