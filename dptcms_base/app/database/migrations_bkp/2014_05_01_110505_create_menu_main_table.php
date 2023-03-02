<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuMainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu_main', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('menu_name');
			$table->string('menu_link_alies');
			$table->integer('menu_order');
			$table->integer('menu_has_child');
			$table->string('menu_type');
			$table->string('menu_content');
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
		Schema::drop('menu_main');
	}

}
