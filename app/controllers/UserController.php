<?php

use Bagito\Storage\UserRepository as User;
use Bagito\Auth\AuthRepository as Auth;

class UserController extends \BaseController {

	private $pages = 6;

	public function __construct(User $user, Auth $auth)
	{
		$this->user = $user;
		$this->auth = $auth;
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

		$users = $this->user->paginate($this->pages);

		if($accessname == 'Secretary') {
			return View::make('secretary.users.view', compact('users'))->with('repo',$this->user)->with('keyword', '');
		}
		return View::make('admin.users.view', compact('users'))->with('repo',$this->user)->with('keyword', '');
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
			return View::make('secretary.users.create');
		}
		return View::make('admin.users.create');
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

		/*validation*/
		$rules = array(
			'firstname' => 'required',
			'lastname' => 'required',
			'middlename' => 'required',
			'gender' => 'required',
			'email' => 'required|unique:users,email',
			'contactno' => 'required',
			'address' => 'required',
			'role' => 'required',
			'password' => 'required|confirmed'
		);

		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			Input::flashExcept('password','gender');
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$this->user->create(Input::all());

			if($accessname == 'Secretary') {
				return Redirect::to('secretary/users');
			}
			return Redirect::to('admin/users');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$currentuser = $this->auth->getCurrentUser();
		$accessname = $this->auth->getCurrentUserGroup($currentuser)->name;

		$user = $this->user->find($id);
		if($accessname == 'Secretary') {
			return View::make('secretary.users.edit',compact('user'));
		}
		return View::make('admin.users.edit',compact('user'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = $this->auth->getCurrentUser();
		$accessname = $this->auth->getCurrentUserGroup($user)->name;

		/*validation*/
		$rules = array(
			'firstname' => 'required',
			'lastname' => 'required',
			'middlename' => 'required',
			'gender' => 'required',
			'contactno' => 'required',
			'address' => 'required',
		);

		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			Input::flashExcept('password','gender');
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$this->user->update($id, Input::all());

			if($accessname == 'Secretary') {
				return Redirect::to('secretary/users');
			}
			return Redirect::to('admin/users');
		}
	}


	public function search()
	{
		$user = $this->auth->getCurrentUser();
		$accessname = $this->auth->getCurrentUserGroup($user)->name;

		$keyword = Input::get('keyword');
		$users = $this->user->search($keyword,$this->pages);

		if($accessname == 'Secretary') {
			return View::make('secretary.users.view', compact('users'))->with('repo',$this->user)->with('keyword', $keyword);
		}
		return View::make('admin.users.view', compact('users'))->with('repo',$this->user)->with('keyword', $keyword);
	}
}
