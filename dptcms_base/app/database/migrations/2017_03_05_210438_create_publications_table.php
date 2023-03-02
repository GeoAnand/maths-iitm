<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePublicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('title', 65535);
			$table->text('author', 65535);
			$table->string('year');
			$table->string('volume');
			$table->text('abstract', 65535)->nullable();
			$table->text('attachment', 65535)->nullable();
			$table->string('research_group', 100)->default('0');
			$table->string('pages');
			$table->string('doi');
			$table->text('journal', 65535);
			$table->timestamps();
			$table->integer('added_by');
			$table->string('url');
			$table->text('bibtexkey', 65535)->nullable();
			$table->text('x_bibtex_type', 65535)->nullable();
			$table->text('number', 65535)->nullable();
			$table->text('timestamp', 65535)->nullable();
			$table->text('biburl', 65535)->nullable();
			$table->text('bibsource', 65535)->nullable();
			$table->text('_author', 65535)->nullable();
			$table->text('fjournal', 65535)->nullable();
			$table->text('issn', 65535)->nullable();
			$table->text('mrclass', 65535)->nullable();
			$table->text('mrnumber', 65535)->nullable();
			$table->text('booktitle', 65535)->nullable();
			$table->text('month', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('publications');
	}

}
