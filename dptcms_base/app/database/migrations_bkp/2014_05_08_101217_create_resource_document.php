<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceDocument extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resource_document', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('resource_document_title');
			$table->text('resource_document_body');
			$table->text('resource_document_link');
			$table->text('resource_document_file');
			$table->text('resource_document_created_by');
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
		Schema::drop('resource_document');
	}

}
