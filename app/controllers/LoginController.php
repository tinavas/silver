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
			$response = $this->auth->authenticate($username, $password);
		} 
		catch (BagitoException $e) 
		{
			Session::flash('errorMessage',$e->getMessage());
			return View::make('index');
		}	
		return Redirect::to('/admin');
	}
}