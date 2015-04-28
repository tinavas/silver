<?php

use Bagito\Storage\ProjectRepository as Project;
use Bagito\Storage\UserRepository as User;
use Bagito\Storage\QuotationRepository as Quotation;
use Bagito\Auth\AuthRepository as Auth;
use Bagito\Utilities\BagitoException;
use Bagito\Storage\NotificationRepository as  Notification;

class ProjectController extends \BaseController {

	private $pages = 10;

	public function __construct(Project $project, User $user, Quotation $quotation, Auth $auth, Notification $notification){
		$this->project = $project;
		$this->user = $user;
		$this->quotation = $quotation;
		$this->auth = $auth;
		$this->notification = $notification;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = $this->auth->getCurrentUser();
		$accessname = $this->auth->getCurrentUserGroup($user)->name;

		$projects = $this->project->paginate($this->pages);

		if($accessname == 'Secretary') {
			return View::make('secretary.projects.view',compact('projects'))->with('repo', $this->project)->with('keyword','');
		}

		return View::make('admin.projects.view',compact('projects'))->with('repo', $this->project)->with('keyword','');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user = $this->auth->getCurrentUser();
		$accessname = $this->auth->getCurrentUserGroup($user)->name;

		if($accessname == 'Secretary') {
			return View::make('secretary.projects.create');
		}

		return View::make('admin.projects.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = $this->auth->getCurrentUser();
		$accessname = $this->auth->getCurrentUserGroup($user)->name;
		//
		$rules = array(
			'title' => 'required',
			'description' => 'required',
			'location' => 'required'
		);

		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}

		$this->project->create(Input::all());

		if($accessname == 'Secretary') {
			return Redirect::to('secretary/projects');
		}

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
		$user = $this->auth->getCurrentUser();
		$accessname = $this->auth->getCurrentUserGroup($user)->name;

		$quotation = null;
		$project = $this->project->find($id);
		$users = $this->project->getSubscribers($id);
		$quotations = $this->project->getForApprovalQuotations($project->id);
		$approved = $this->project->getApprovedQuotationByProject($project->id);
		$status = [
					-1 => 'Cancelled',
					2 => 'Done'
				  ];
		if(!is_null($project->active_quotation_id)){
			$quotation = $this->quotation->find($project->active_quotation_id);
		}

		if($accessname == 'Secretary') {
			return View::make('secretary.projects.show',compact('project','quotations','quotation','status','approved'))->with('users',$users->get());
		}

		return View::make('admin.projects.show',compact('project','quotations','quotation','status','approved'))->with('users',$users->get());
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
		$user = $this->auth->getCurrentUser();
		$accessname = $this->auth->getCurrentUserGroup($user)->name;

		$project = $this->project->find($id);

		if($accessname == 'Secretary') {
			return View::make('secretary.projects.edit',compact('project'));
		}
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
		$user = $this->auth->getCurrentUser();
		$accessname = $this->auth->getCurrentUserGroup($user)->name;

		$rules = array(
			'title' => 'required',
			'description' => 'required',
			'location' => 'required'
		);

		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}

		$this->project->update($id, Input::all());

		if($accessname == 'Secretary') {
			return Redirect::to('secretary/projects');
		}
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
		$user = $this->auth->getCurrentUser();
		$accessname = $this->auth->getCurrentUserGroup($user)->name;

		$keyword = Input::get('keyword');
		$projects = $this->project->search($keyword,$this->pages);

		if($accessname == 'Secretary') {
			return View::make('secretary.projects.view', compact('projects'))->with('repo',$this->project)->with('keyword', $keyword);
		}
		return View::make('admin.projects.view', compact('projects'))->with('repo',$this->project)->with('keyword', $keyword);
	}

	public function addUser($projectId)
	{
		$user = $this->auth->getCurrentUser();
		$accessname = $this->auth->getCurrentUserGroup($user)->name;

		$users = $this->project->getNonSubscribers($projectId);

		if($accessname == 'Secretary') {
			return View::make('admin.projects.add-user-to-projects', compact('users'))->with('project_id', $projectId);
		}
		return View::make('admin.projects.add-user-to-projects', compact('users'))->with('project_id', $projectId);

	}

	public function storeUserToProject($projectId, $userId)
	{
		$user = $this->auth->getCurrentUser();
		$accessname = $this->auth->getCurrentUserGroup($user)->name;
		
		$this->project->addUser($userId, $projectId);

		if($accessname == 'Secretary') {
			return Redirect::to('admin/projects/' . $projectId);
		}
		return Redirect::to('admin/projects/' . $projectId);
	}

	public function removeUser($projectId, $userId){
		$this->project->removeUser($userId,$projectId);
		return Redirect::back();
	}

	/*public function showChangeStatus($id){
		$quotations = $this->project->getForApprovalQuotations($project->id);
		$quotations = $quotations->lists('');
	}*/

	public function setAsActiveQuotation($projectId, $quotationId){

		$this->project->addActiveQuotation($projectId, $quotationId);
		$quotation = $this->quotation->changeStatus($quotationId,2);
		$this->notification->create($quotation->user()->first()->id,'Your Quotation: "' . $quotation->title . '" has been Approved by the Client');
		return Redirect::back();
	}

	public function changeStatus($id){
		try 
		{
			$user = $this->auth->getCurrentUser();
			$username = $user->email;
			$password = Input::get('password');
			$user = $this->auth->authenticate($username, $password);
		} 
		catch (BagitoException $e) 
		{
			Session::flash('errorMessage',$e->getMessage());
			return Redirect::back();
		}
		Session::flash('notification','Project Updated Successfuly');
		$status = Input::get('status');
		$this->project->changeStatus($id,$status);
		return Redirect::back();
	}

	public function requestForUpdate($id){
		$record = $this->project->findQuotationLoad($id);
		$quotation = $record->quotation()->first();
		$message = "Administrator Requests for an update on your quotation for " . $quotation->title;
		$receiver = $quotation->user_id;
		$this->notification->create($receiver, $message);
		//$this->project->deleteQuotationLoad($id);
		Session::flash('notification','Notification Sent');
		return Redirect::back();
	}

	public function disapprove($id){
		$quotation = $this->project->disapprove($id);
		$this->notification->create($quotation->user()->first()->id,'Your Quotation: "' . $quotation->title . '" has been Approved by the Client');
		return Redirect::back();
	}

}
