<?php

class ProjectTableSeeder extends Seeder{

	public function run(){

		$project = new Project;
		$project->title = "Bagito Online Casino";
		$project->description = "Online Casino";
		$project->location = "Bagito Express Train";
		$project->save();

		
	}
}