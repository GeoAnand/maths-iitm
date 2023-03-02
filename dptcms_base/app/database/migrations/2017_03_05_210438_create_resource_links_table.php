<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResourceLinksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resource_links', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('resource_links_title', 65535);
			$table->text('resource_links_link', 65535);
			$table->text('resource_links_created_by', 65535);
			$table->timestamps();
			$table->integer('needlogin');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resource_links');
	}

}
