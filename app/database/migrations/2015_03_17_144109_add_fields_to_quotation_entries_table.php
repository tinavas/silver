<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddFieldsToQuotationEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('quotation_entries', function(Blueprint $table)
		{
			$table->decimal('um',16,2);
			$table->decimal('tm',16,2);
			$table->decimal('ul',16,2);
			$table->decimal('tl',16,2);
			$table->decimal('dc',16,2);
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
			$table->dropColumn('um');
			$table->dropColumn('tm');
			$table->dropColumn('ul');
			$table->dropColumn('tl');
			$table->dropColumn('dc');
		});
	}

}
