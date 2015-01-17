<?php
use Bagito\Auth\AuthRepository as Auth;

class LoginController extends BaseController{

	public function __construct(Auth $auth)
	{
		$this->auth = $auth;
	}

	public function showLogin()
	{
		return View::make('index');
	}

	public function login()
	{
		$username = Input::get('username');
		$password = Input::get('password');
		try 
		{
			$this->auth->authenticate($username, $password);	
		} 
		catch (Exception $e)
		{
			Session::flash('errorMessage',$e->getMessage());
			return Redirect::back();
		}
		return Redirect::to('/admin');
	}
}