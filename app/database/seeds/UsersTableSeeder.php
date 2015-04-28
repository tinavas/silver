<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$faker->addProvider('Faker\Provider\en_US\PhoneNumber');
		$adminGroup = Sentry::findGroupByName('Administrator');
		$architectGroup = Sentry::findGroupByName('Architect');
		$secretaryGroup = Sentry::findGroupByName('Secretary');
		#create admins
		foreach(range(1, 10) as $index){
			$user = Sentry::createUser([
				"email" => $faker->email(),
				"password" => 'test',
				'first_name' => $faker->firstName,
				'last_name' => $faker->lastName,
				"address" => $faker->address(),
				"contact_number" => $faker->phoneNumber(),
				'activated' => true
			]);
			$user->addGroup($adminGroup);
		}

		#create users
		foreach(range(1, 10) as $index){
			$user = Sentry::createUser([
				"email" => $faker->email(),
				"password" => 'test',
				'first_name' => $faker->firstName,
				'last_name' => $faker->lastName,
				"address" => $faker->address(),
				"contact_number" => $faker->phoneNumber(),
				'activated' => true
			]);
			$user->addGroup($architectGroup);
		}

		$user = Sentry::createUser([
			"email" => 'jmramos@creativejose.com',
			'password' => 'test',
			'first_name' => 'JM',
			'last_name' => 'Ramos',
			'address' => '110 brgy Coloong II Valenzuela City',
			'contact_number' => '+639054704478',
			'activated' => true
		]);
		$user->addGroup($adminGroup);

		$user = Sentry::createUser([
			"email" => 'ramosjosemari@gmail.com',
			'password' => 'test',
			'first_name' => 'Jose Mari',
			'last_name' => 'Ramos',
			'address' => '110 brgy Coloong II Valenzuela City',
			'contact_number' => '+639054704478',
			'activated' => true
		]);
		$user->addGroup($architectGroup);

		$user = Sentry::createUser([
			"email" => 'turingan.joshua@gmail.com',
			'password' => 'test',
			'first_name' => 'Joshua',
			'last_name' => 'Turingan',
			'address' => '983 metom st. brgy. comm. q.c',
			'contact_number' => '+639054005755',
			'activated' => true
		]);
		$user->addGroup($architectGroup);

		$user = Sentry::createUser([
			"email" => 'tors@gmail.com',
			'password' => 'test',
			'first_name' => 'Joshua',
			'last_name' => 'Turingan',
			'address' => '983 metom st. brgy. comm. q.c',
			'contact_number' => '+639054005755',
			'activated' => true
		]);
		$user->addGroup($secretaryGroup);
	}
}