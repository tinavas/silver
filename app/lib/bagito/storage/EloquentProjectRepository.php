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

		$project->save();
		return $project;
	}

	public function update($id, $inputs)
	{
		$project = Project::find($id);
		$project->title = $inputs['title'];
		$project->description = $inputs['description'];
		$project->location = $inputs['location'];
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


	public function inProject($userId, $projectId){
		$load =  UserLoad::where('user_id' , '=' , $userId)->where('project_id', '=' , $projectId)->get();
		return (count($load) != 0) ? true : false;
	}

	public function getQuotations($projectId){
		$project = Project::find($projectId);
		return $project->quotations()->get();
	}

	public function getForApprovalQuotations($projectId){
		$project = Project::find($projectId);
		return $project->quotations()->where('status',1)->get();
	}

	public function addActiveQuotation($projectId, $quotationId){
		/*$project = Project::find($projectId);
		$project->active_quotation_id = $quotationId;
		$project->status = 1;
		$project->save();*/
	}


}