<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArrowsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arrows', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('projet_id');
			$table->integer('top');
			$table->integer('left');
			$table->integer('no');
			$table->string('couleur');
			$table->string('position');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('arrows');
	}

}
