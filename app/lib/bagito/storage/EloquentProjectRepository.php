<?php namespace Bagito\Storage;

use Project;
use UserLoad;
use User;

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
		$project->deadline = strtotime($inputs['deadline']);

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
		$project->deadline = strtotime($inputs['deadline']);
		$project->save();
		return $project;
	}

	public function search($keyword, $pages)
	{
		return Project::where('title','LIKE', "%$keyword%")
						->orWhere('description', 'LIKE', "%$keyword%")
						->orWhere('location', 'LIKE', "")->paginate($pages);
	}

	public function getNumberOfSubscribers($id)
	{
		return Project::find($id)->users()->count();
	}

	public function getSubscribers($projectId)
	{
		$project = Project::find($projectId);
		return $project->users();
	}

	public function getNonSubscribers($projectId)
	{
		$subs = Project::find($projectId)->users()->get();
		$array = [];
		foreach($subs as $sub)
		{
			$array[] = $sub->id;
		}

		if(count($array) == 0){
			$users = User::whereHas('roles',function($q) {
				$q->where('group_id',2);
			})->get();
		}else{
			$users = User::whereHas('roles',function($q) {
				$q->where('group_id',2);
			})->whereNotIn('id', $array)->get();
		}
		
		return $users;
	}

	public function addUser($userId, $projectId)
	{
		$load = new UserLoad;
		$load->user_id = $userId;
		$load->project_id = $projectId;
		$load->save();
	}

	public function removeUser($userId, $projectId)
	{
		$load = UserLoad::where('user_id' , '=' , $userId)->where('project_id', '=' , $projectId)->first();
		$load->delete();
	}
}