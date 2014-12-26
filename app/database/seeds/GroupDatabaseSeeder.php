<?php

class GroupDatabaseSeeder extends Seeder{
	public function run(){
		$group = Sentry::createGroup(array(
			'name' => 'Administrator',
			'permissions' => array(
				'admin' => 1
			)
		));

		$group = Sentry::createGroup(array(
			'name' => 'Architect',
			'permissions' => array(
				'archi' => 1
			)
		));
	}
}