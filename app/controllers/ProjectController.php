<?php

use Bagito\Storage\ProjectRepository as Project;
use Bagito\Storage\UserRepository as User;

class ProjectController extends \BaseController {

	private $pages = 10;

	public function __construct(Project $project, User $user)
	{
		$this->project = $project;
		$this->user = $user;
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
			'code' => 'required',
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
		return View::make('admin.projects.show',compact('project'));
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

	public function addUser()
	{
		$users = $this->user->getAllArchitects();
		return View::make('admin.projects.add-user-to-projects', compact('users'));

	}

	public function storeUserToProject()
	{

	}
}
