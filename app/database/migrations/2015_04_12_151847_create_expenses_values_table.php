<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpensesValuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenses_values', function(Blueprint $table)
		{
			$table->increments('id');
			$table->decimal('cost',16,2);
			$table->integer('expense_id')->unsigned();
			$table->foreign('expense_id')->references('id')->on('other_expenses');
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
		Schema::drop('expenses_values');
	}

}
