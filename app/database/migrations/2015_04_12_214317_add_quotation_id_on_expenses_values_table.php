<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddQuotationIdOnExpensesValuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('expenses_values', function(Blueprint $table)
		{
			$table->integer('quotation_id')->unsigned();
			$table->foreign('quotation_id')->references('id')->on('quotations');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('expenses_values', function(Blueprint $table)
		{
			
		});
	}

}
