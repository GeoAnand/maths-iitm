<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBibliographyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bibliography', function(Blueprint $table)
		{
			$table->string('bibtexkey')->default('')->primary();
			$table->text('x_bibtex_type', 65535)->nullable();
			$table->text('author', 65535)->nullable();
			$table->text('title', 65535)->nullable();
			$table->text('journal', 65535)->nullable();
			$table->text('volume', 65535)->nullable();
			$table->text('number', 65535)->nullable();
			$table->text('pages', 65535)->nullable();
			$table->text('year', 65535)->nullable();
			$table->text('url', 65535)->nullable();
			$table->text('timestamp', 65535)->nullable();
			$table->text('biburl', 65535)->nullable();
			$table->text('bibsource', 65535)->nullable();
			$table->text('_author', 65535)->nullable();
			$table->text('doi', 65535)->nullable();
			$table->text('fjournal', 65535)->nullable();
			$table->text('issn', 65535)->nullable();
			$table->text('mrclass', 65535)->nullable();
			$table->text('mrnumber', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bibliography');
	}

}
