<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableResearchgroup extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('researchgroup', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('researchgroup_name');
			$table->text('researchgroup_desc');
			$table->string('researchgroup_users');
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
		Schema::drop('researchgroup');
	}

}
