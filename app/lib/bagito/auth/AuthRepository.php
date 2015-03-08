<?php namespace Bagito\Auth;

interface AuthRepository{

	public function authenticate($username, $password);

	public function getCurrentUser();

	public function logout();

	public function getCurrentUserGroup();

	public function getGroup($user);

	public function updatePassword($id, $password);

}