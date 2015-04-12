<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RemoveFieldsOnOtherExpensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('other_expenses', function(Blueprint $table)
		{

			$table->dropForeign('other_expenses_quotation_id_foreign');
			$table->dropColumn('description');
			$table->dropColumn('quotation_id');
			$table->dropColumn('cost');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('other_expenses', function(Blueprint $table)
		{
			
		});
	}

}
