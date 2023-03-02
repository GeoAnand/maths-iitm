<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('news_title');
			$table->string('news_description');
			$table->string('news_date');
			$table->integer('news_by');
			$table->integer('news_publish');
			$table->integer('news_archive');
			$table->timestamps();
			$table->integer('news_type');
			$table->string('news_link');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('news');
	}

}
