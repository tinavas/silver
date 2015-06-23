<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddFiledsToValuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('values', function(Blueprint $table)
		{
			$table->decimal('material',16,2);
			$table->decimal('labor',16,2);
			$table->decimal('total',16,2);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('values', function(Blueprint $table)
		{
			
		});
	}

}
