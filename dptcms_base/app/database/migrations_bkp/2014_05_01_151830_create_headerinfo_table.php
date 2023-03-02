<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeaderinfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('headerinfo', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('headerinfo_image');
			$table->string('headerinfo_dept_name');
			$table->string('headerinfo_tag_line');
			$table->string('headerinfo_background_img');
			$table->integer('headerinfo_updated_by');
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
		Schema::drop('headerinfo');
	}

}
