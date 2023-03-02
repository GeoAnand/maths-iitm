<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResourceDocumentTable extends Migration {

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
			$table->text('resource_document_title', 65535);
			$table->text('resource_document_body', 65535);
			$table->text('resource_document_link', 65535);
			$table->text('resource_document_file', 65535);
			$table->text('resource_document_created_by', 65535);
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
		Schema::drop('resource_document');
	}

}
