<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectLoadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_load', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('project_id')->unsigned();
			$table->boolean('status'); /*-1 = not yet done (encoding stage), 0 = not approved, 1 = approved, sent to client, 2 = approved by client, on going*/
			$table->datetime('date_approved');
			$table->foreign('project_id')->references('id')->on('projects');
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
		Schema::drop('project_load');
	}

}
