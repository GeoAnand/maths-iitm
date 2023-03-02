<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookpublishedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bookpublished', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('book_name');
			$table->string('book_authors');
			$table->string('book_publisher',500);
			$table->string('book_isbn',100);
			$table->integer('book_year');
			$table->string('book_other_details');
			$table->string('book_edition',20);
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
		Schema::drop('bookpublished');
	}

}
