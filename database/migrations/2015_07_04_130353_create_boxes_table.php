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
            $table->integer('schema_id');
			$table->integer('top');
			$table->integer('left');
			$table->integer('no')->nullable();
			$table->integer('width');
			$table->integer('height');
			$table->string('couleur')->nullable();
			$table->text('text')->nullable();
			$table->string('border')->nullable();
			$table->integer('zindex')->nullable();
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
