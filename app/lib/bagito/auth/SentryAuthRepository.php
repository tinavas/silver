<?php namespace Bagito\Auth;

use Sentry;

/**
* See https://cartalyst.com/manual/sentry/2.1 for more details
* Sentry repository
*
*/

class SentryAuthRepository implements  AuthRepository{

	/**
	* Authenticates the user provided with username and password	
	* The user must be activated in order to login. 
	*
	* @return Sentry User
	*/

	public function authenticate($username, $password){
		$user = Sentry::authenticate(
					'username' => $username,
					'password' => $password
				);
		return $user;
	}

	/**
	* Returns the current user
	* 
	* @return Sentry User
	*/

	public function getCurrentUser(){

		return Sentry::getUser();

	}

	/**
	* Logs out the current user
	* destroys all cookies/sessions
	*
	* @return void
	*/

	public function logout(){
		return Sentry::logout();
	}

	/**
	* Gets group/role assigned to current user
	* 
	* @return Sentry Group
	*/

	public function getCurrentUserGroup(){
		$user = Sentry::getUser();
		return $user->getGroups();
	}

	/**
	* Get group/role for user
	*
	* @return Sentry Group
 	*/

	public function getGroup($user){
		return $user->getGroups();
	}
	/**
	* Checks if a user is currently login 
	* @return boolean
	*/
	public function check(){
		return Sentry::check();
	}
}