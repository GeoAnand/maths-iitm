<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_type', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('user_type_name');
			$table->integer('user_type_created_by');
			$table->timestamps();
			$table->string('link');
			$table->string('user_subtype', 100)->default('0');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_type');
	}

}
