<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResourceGalleryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resource_gallery', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('resource_gallery_text')->nullable();
			$table->integer('resource_gallery_album_id');
			$table->string('resource_gallery_type');
			$table->string('resource_gallery_size');
			$table->string('resource_gallery_originalname');
			$table->string('resource_gallery_filename');
			$table->string('resource_gallery_uploaded_by');
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
		Schema::drop('resource_gallery');
	}

}
