<?php
use Bagito\Auth\AuthRepository as Auth;
use Bagito\Utilities\BagitoException as BagitoException;

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
		$username = Input::get('email');
		$password = Input::get('password');
		try 
		{
			$user = $this->auth->authenticate($username, $password);
		} 
		catch (BagitoException $e) 
		{
			Session::flash('errorMessage',$e->getMessage());
			return View::make('index');
		}	

		if($this->auth->getCurrentUserGroup($user)->name == "Administrator")
		{
			return Redirect::to('/admin');
		}
		else
		{
			return Redirect::to('/architect');
		}
	}

	public function logout()
	{
		$this->auth->logout();
		return Redirect::to('/');
	}
}