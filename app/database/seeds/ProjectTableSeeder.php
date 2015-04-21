<?php

class ProjectTableSeeder extends Seeder{

	public function run(){

		$project = new Project;
		$project->title = "Bagito Online Casino";
		$project->description = "Online Casino";
		$project->location = "Bagito City";
		$project->save();

		$project = new Project;
		$project->title = "Harvest Moon";
		$project->description = "Park Casino";
		$project->location = "Metro Manila";
		$project->save();

		$project = new Project;
		$project->title = "Great Mood Sinkship";
		$project->description = "Trending Casino";
		$project->location = "Pampanga";
		$project->save();

		$project = new Project;
		$project->title = "Dream Suite";
		$project->description = "Online Casino";
		$project->location = "Baguio City";
		$project->save();
		
	}
}