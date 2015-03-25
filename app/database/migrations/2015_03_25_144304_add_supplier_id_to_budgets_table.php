<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddSupplierIdToBudgetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('budgets', function(Blueprint $table)
		{
			$table->integer('supplier_id')->unsigned();
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('budgets', function(Blueprint $table)
		{
			
		});
	}

}
