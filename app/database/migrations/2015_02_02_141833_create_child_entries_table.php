<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChildEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('child_entries', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('child_id')->unsigned();
			$table->integer('parent_id')->unsigned();

			$table->foreign('child_id')->references('id')->on('quotation_entries');
			$table->foreign('parent_id')->references('id')->on('quotation_entries');
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
		Schema::drop('child_entries');
	}

}
