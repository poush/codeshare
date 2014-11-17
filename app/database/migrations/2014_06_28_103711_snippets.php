<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Snippets extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('snippets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('authorId');
			$table->string('category');
			$table->string('title');
			$table->longText('code');
			$table->string('description','20000')->nullable();
			$table->integer('public')->default(1);
			$table->softDeletes();
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
		Schema::drop('snippets');
	}

}
