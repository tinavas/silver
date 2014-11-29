<?php

class GreetController extends BaseController{
	public function greetTheUser(){
		$users = User::paginate(15);
		/*$user = User::find(1);
		$user = User::where('first_name','=','jm')->get();
		$user*/
		return View::make('greet')->with('users',$users);
	}
}