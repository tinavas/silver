<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RemoveQuantityOnQuotationEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('quotation_entries', function(Blueprint $table)
		{
			
			$table->dropColumn('quantity');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('quotation_entries', function(Blueprint $table)
		{
			
		});
	}

}
