<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddRatesOnQuotationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('quotations', function(Blueprint $table)
		{
			$table->decimal('cont',16,2)->default(0.03);
			$table->decimal('others',16,2);
			$table->decimal('tax',16,2)->default(0.10);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('quotations', function(Blueprint $table)
		{
			$table->dropColumn('cont');
			$table->dropColumn('others');
			$table->dropColumn('tax');
		});
	}

}
