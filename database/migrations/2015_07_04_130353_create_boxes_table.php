<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBoxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('boxes', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('top');
			$table->integer('left');
			$table->integer('no');
			$table->integer('width');
			$table->integer('height');
			$table->string('couleur');
			$table->text('text');
			$table->string('border');
			$table->integer('zindex');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('boxes');
	}

}
