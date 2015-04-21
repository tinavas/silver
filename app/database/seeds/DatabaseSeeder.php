<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('GroupDatabaseSeeder');
		 $this->call('UsersTableSeeder');
		 $this->call('EntryTableSeeder');
		 $this->call('SubHeaderTableSeeder');
		 $this->call('ChildTableSeeder');
		 $this->call('OtherExpenseTableSeeder');
	}

}
