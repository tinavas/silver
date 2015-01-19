<?php

use Bagito\Storage\UserRepository as User;

class UserController extends \BaseController {

	private $pages = 6;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->user->paginate($this->pages);
		return View::make('admin.users.view', compact('users'))->with('repo',$this->user)->with('keyword', '');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
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
		$user = $this->user->find($id);
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
			return Redirect::to('admin/users');
		}
	}


	public function search()
	{
		$keyword = Input::get('keyword');
		$users = $this->user->search($keyword,$this->pages);
		return View::make('admin.users.view', compact('users'))->with('repo',$this->user)->with('keyword', $keyword);
	}
}
