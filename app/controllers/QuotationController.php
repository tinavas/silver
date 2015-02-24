<?php

use Bagito\Storage\UserRepository as User;
use Bagito\Storage\ProjectRepository as Project;
use Bagito\Auth\AuthRepository as Auth;
use Bagito\Storage\QuotationRepository as Quotation;

class QuotationController extends BaseController
{

	public function __construct(User $user, Project $project, Auth $auth, Quotation $quotation)
	{
		$this->user = $user;
		$this->project = $project;
		$this->auth = $auth;
		$this->quotation = $quotation;
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

	public function store($id)
	{
		$rules = ['title' => 'required'];

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$user = $this->auth->getCurrentUser();
			$this->quotation->create($user->id, $id, Input::all());
			return 'YEHEY';
		}
	}

	public function viewProject($id)
	{
		$quotations = $this->quotation->getActive($id);
		$project = $this->project->find($id);
		$users = $this->project->getSubscribers($id)->get();
		return View::make('architect.quotation.show',compact('quotations','project','users'));
	}

	public function showQuotations()
	{
		$user = $this->auth->getCurrentUser();	
		$quotations = $this->quotation->getAllQuotationByUser($user->id);
		return View::make('architect.quotation.index',compact('quotations'));
	}

	public function edit($id)
	{
		$quotation = $this->quotation->find($id);
		return View::make('architect.quotation.edit',compact('quotation'));
	}

	public function update($id)
	{
		$rules = array(
			'title' => 'required',
			'remarks' => 'required',
		);

		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}

		$this->quotation->update($id,Input::all());

		return Redirect::to('/architect/quotations');

	}

	public function view($id)
	{
		$quotation = $this->quotation->find($id);
		$project = $quotation->project()->first();
		return View::make('architect.quotation.view-quotations',compact('quotation','project'));
	}
}