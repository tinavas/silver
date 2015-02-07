<?php

use Bagito\Storage\UserRepository as User;
use Bagito\Storage\ProjectRepository as Project;
use Bagito\Auth\AuthRepository as Auth;

class QuotationController extends BaseController
{

	public function __construct(User $user, Project $project, Auth $auth)
	{
		$this->user = $user;
		$this->project = $project;
		$this->auth = $auth;
	}

	public function create($id)
	{
		return View::make('architect.quotation.create',compact('id'));
	}

	public function showProjects()
	{
		//get auth version of user
		$authUser = $this->auth->getCurrentUser();
		
		//get eloquent version of user
		$user = $this->user->find($authUser->id);

		$projects = $this->user->getProjects($user);

		return View::make('architect.index',compact('projects'));
	}
}