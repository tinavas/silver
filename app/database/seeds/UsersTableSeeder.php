<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$adminGroup = Sentry::findGroupByName('Administrator');
		$architecGroup = Sentry::findGroupByName('Architect');
		#create admins
		foreach(range(1, 10) as $index){
			$user = Sentry::createUser([
				"username" => $faker->username(),
				"password" => 'test',
				'activated' => true
			]);
			$user->addGroup($adminGroup);
		}

		#create users
		foreach(range(1, 10) as $index){
			$user = Sentry::createUser([
				"username" => $faker->username(),
				"password" => 'test',
				'activated' => true
			]);
			$user->addGroup($adminGroup);
		}
	}
}