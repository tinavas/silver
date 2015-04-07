<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RemoveFieldsOnQuotationEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('quotation_entries', function(Blueprint $table)
		{
			$table->dropForeign('quotation_entries_quotation_id_foreign');
			$table->dropColumn('quotation_id');
			$table->dropColumn('quantity');
			$table->dropColumn('ul');
			$table->dropColumn('um');
			$table->dropColumn('tl');
			$table->dropColumn('tm');
			$table->dropColumn('dc');
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
