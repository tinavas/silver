<?php

use Bagito\Storage\NotificationRepository as Notification;

class NotificationsController extends \BaseController {

	private $pages = 10;
	
	public function __construct(Notification $notification){
		$this->notification = $notification;
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
		$notifications = $this->notification->paginate($this->pages);
		return View::make('admin.notifications',compact('notifications'))->with('repo', $this->notification)->with('keyword','');
	}

	public function indexArchitectNotif()
	{
		//
		$notifications = $this->notification->paginate($this->pages);
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