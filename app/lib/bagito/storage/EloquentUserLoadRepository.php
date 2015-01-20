<?php namespace Bagito\Storage;

use UserLoad;

class EloquentUserLoadRepository implements UserLoadRepository
{
	public function create($userId, $projectId)
	{
		$load = new UserLoad();
		$load->user_id = $userId;
		$load->projectid = $projectId;
		$load->save();

		return $load;
	}

	public function delete($userId, $projectId)
	{
		$load = UserLoad::where('user_id', '=', $userId)
						->where('project_id','=',$projectId)->get();

		$load->delete();
	}
}