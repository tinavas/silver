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
			'location' => 'required'
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
			'location' => 'required'
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
