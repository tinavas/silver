<?php

use Bagito\Storage\NotificationRepository as Notification;
use Bagito\Auth\AuthRepository as Auth;

class NotificationsController extends \BaseController {

	public function __construct(Notification $notification, Auth $auth){
		$this->notification = $notification;
		$this->auth = $auth;
	}

	/**
	 * Display a listing of the resource.
	 * GET /notifications
	 *
	 * @return Response
	 */
	public function indexAdminNotif()
	{
		//
		$user = $this->auth->getCurrentUser();
		$notifications = $this->notification->getNotifications($user->id);
		return View::make('admin.notifications',compact('notifications'))->with('repo', $this->notification)->with('keyword','');
	}

	public function indexArchitectNotif()
	{
		$user = $this->auth->getCurrentUser();
		$notifications = $this->notification->getNotifications($user->id);
		return View::make('architect.notifications',compact('notifications'))->with('repo', $this->notification)->with('keyword','');
	}


	/**
	 * Show the form for creating a new resource.
	 * GET /notifications/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /notifications
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /notifications/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /notifications/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /notifications/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /notifications/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}