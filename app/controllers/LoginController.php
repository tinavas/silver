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

	public function changeAdminPassword(){
		return View::make('admin.change-password');
	}

	public function changeArchitectPassword(){
		return View::make('architect.change-password');
	}

	public function updateAdminPassword(){
		$rules = [
			'password' => 'required',
			'new_password' => 'required|confirmed',
			'new_password_confirmation' => 'required'
		];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}else{
			$user = $this->auth->getCurrentUser();
			try{	
				$username = $user->email;
				$password = Input::get('password');
				$user = $this->auth->authenticate($username, $password);	
			}catch (BagitoException $e) {
				Session::flash('errorMessage',$e->getMessage());
				return Redirect::back();
			}
			$this->auth->updatePassword($user->id, Input::get('new_password'));
			return Redirect::to('/admin');
		}
	}

	public function updateArchitectPassword(){
		$rules = [
			'password' => 'required',
			'new_password' => 'required|confirmed',
			'new_password_confirmation' => 'required'
		];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}else{
			$user = $this->auth->getCurrentUser();
			try{	
				$username = $user->email;
				$password = Input::get('password');
				$user = $this->auth->authenticate($username, $password);	
			}catch (BagitoException $e) {
				Session::flash('errorMessage',$e->getMessage());
				return Redirect::back();
			}
			$this->auth->updatePassword($user->id, Input::get('new_password'));
			return Redirect::to('/architect');
		}
	}
}