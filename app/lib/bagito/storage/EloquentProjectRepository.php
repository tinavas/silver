<?php namespace Bagito\Storage;

use Project;

class EloquentProjectRepository implements ProjectRepository
{
	public function find($id)
	{
		return Project::find($id);
	}

	public function all()
	{
		return Project::all();
	}

	public function paginate($pages)
	{
		return Project::paginate($pages);
	}

	public function create($inputs)
	{
		$project = new Project;
		$project->title = $inputs['title'];
		$project->description = $inputs['description'];
		$project->location = $inputs['location'];
		$project->budget = $inputs['budget'];
		$project->deadline = $inputs['deadline'];

		$project->save();
		return $project;
	}

	public function update($id, $inputs)
	{
		$project = Project::find($id);
		$project->title = $inputs['title'];
		$project->description = $inputs['description'];
		$project->location = $inputs['location'];
		$project->budget = $inputs['budget'];
		$project->deadline = $inputs['deadline'];

		$project->save();
		return $project;
	}

	public function search($keyword, $pages)
	{
		return Project::where('title','LIKE', "%$keyword%")
						->orWhere('description', 'LIKE', "%$keyword%")
						->orWhere('location', 'LIKE', "")->paginate($pages);
	}
}