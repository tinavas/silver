<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaterialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('materials', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('quotation_id')->unsigned();
			$table->integer('supplier_id')->unsigned();
			$table->decimal('amount',16,2);
			$table->decimal('quantity',16,2);
			$table->string('remarks');
			$table->string('filename');
			$table->timestamps();

			$table->foreign('quotation_id')->references('id')->on('quotation_entries');
			$table->foreign('supplier_id')->references('id')->on('suppliers');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('materials');
	}

}
