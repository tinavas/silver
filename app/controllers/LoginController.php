<?php

class LoginController extends BaseController{

	public function showLogin(){
		return View::make('index');
	}

	public function login(){
		return Redirect::to('/admin');
	}
}