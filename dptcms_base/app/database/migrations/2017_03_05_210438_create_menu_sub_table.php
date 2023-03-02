<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuSubTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu_sub', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('menu_name');
			$table->string('menu_link_alies');
			$table->integer('menu_order');
			$table->integer('menu_has_child');
			$table->integer('memu_parent_id');
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
		Schema::drop('menu_sub');
	}

}
