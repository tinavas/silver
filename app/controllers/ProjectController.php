<?php

use Bagito\Storage\ProjectRepository as Project;
use Bagito\Storage\UserRepository as User;
use Bagito\Storage\QuotationRepository as Quotation;

class ProjectController extends \BaseController {

	private $pages = 10;

	public function __construct(Project $project, User $user, Quotation $quotation){
		$this->project = $project;
		$this->user = $user;
		$this->quotation = $quotation;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = $this->project->paginate($this->pages);
		return View::make('admin.projects.view',compact('projects'))->with('repo', $this->project)->with('keyword','');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.projects.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$rules = array(
			'title' => 'required',
			'description' => 'required',
			'location' => 'required',
			'budget' => 'numeric|required',
			'deadline' => 'date|required'
		);

		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}

		$this->project->create(Input::all());
		return Redirect::to('admin/projects');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$project = $this->project->find($id);
		$users = $this->project->getSubscribers($id);
		$quotations = $this->project->getForApprovalQuotations($project->id);
		return View::make('admin.projects.show',compact('project','quotations'))->with('users',$users->get());
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$project = $this->project->find($id);
		return View::make('admin.projects.edit',compact('project'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$rules = array(
			'title' => 'required',
			'description' => 'required',
			'location' => 'required',
			'budget' => 'numeric|required',
			'deadline' => 'date|required'
		);

		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}

		$this->project->update($id, Input::all());
		return Redirect::to('admin/projects');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function search()
	{
		$keyword = Input::get('keyword');
		$projects = $this->project->search($keyword,$this->pages);
		return View::make('admin.projects.view', compact('projects'))->with('repo',$this->project)->with('keyword', $keyword);
	}

	public function addUser($projectId)
	{
		$users = $this->project->getNonSubscribers($projectId);
		return View::make('admin.projects.add-user-to-projects', compact('users'))->with('project_id', $projectId);

	}

	public function storeUserToProject($projectId, $userId)
	{
		$this->project->addUser($userId, $projectId);
		return Redirect::to('admin/projects/' . $projectId);
	}

	public function removeUser($projectId, $userId)
	{
		$this->project->removeUser($userId,$projectId);
		return Redirect::back();
	}
}
