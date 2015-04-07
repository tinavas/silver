<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateValuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('values', function(Blueprint $table)
		{
			$table->increments('id');
			$table->decimal('quantity',16,2);
			$table->decimal('ul',16,2);
			$table->decimal('um',16,2);
			$table->decimal('tl',16,2);
			$table->decimal('tm',16,2);
			$table->decimal('dc',16,2);
			$table->integer('entry_id')->unsigned();
			$table->integer('quotation_id')->unsigned();

			$table->foreign('entry_id')->references('id')->on('quotation_entries');
			$table->foreign('quotation_id')->references('id')->on('quotations');
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
		Schema::drop('values');
	}

}
