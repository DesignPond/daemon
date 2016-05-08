<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
    public function up() {
        Schema::create('pages', function(Blueprint $table) {
            // These columns are needed for Baum's Nested Set implementation to work.
            // Column names may be changed, but they *must* all exist and be modified
            // in the model.
            // Take a look at the model scaffold comments for details.
            // We add indexes on parent_id, lft, rgt columns by default.
            $table->increments('id');
            $table->integer('parent_id')->nullable()->index();
            $table->integer('lft')->nullable()->index();
            $table->integer('rgt')->nullable()->index();
            $table->integer('depth')->nullable();

            // Add needed columns here (f.ex: name, slug, path, etc.)
            $table->integer('site_id')->nullable();
            $table->integer('rang')->nullable();
            $table->integer('main')->nullable();
            $table->string('title');
            $table->string('template');
            $table->string('slug');
            $table->longText('content');
            $table->softDeletes();
            $table->timestamps();

        });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('pages');
  }

}
