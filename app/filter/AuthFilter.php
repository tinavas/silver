<?php

class AuthFilter {
	public function architect()
	{
		if(Sentry::check())
		{
			$user = Sentry::getUser();
			$architect = Sentry::findGroupByName('Architect');
			if(!$user->inGroup($architect))
			{
				App::abort(403, 'Unauthorized action.');
			}
		}else{
			App::abort(403, 'Unauthorized action.');
		}
		
	}

	public function admin()
	{
		if(Sentry::check())
		{
			$user = Sentry::getUser();
			$admin = Sentry::findGroupByName('Administrator');
			if(!$user->inGroup($admin))
			{
				App::abort(403, 'Unauthorized action.');
			}
		}
		else
		{
			App::abort(403, 'Unauthorized action.');
		}
	}

	public function secretary(){
		if(Sentry::check())
		{
			$user = Sentry::getUser();
			$admin = Sentry::findGroupByName('Secretary');
			if(!$user->inGroup($admin))
			{
				App::abort(403, 'Unauthorized action.');
			}
		}
		else
		{
			App::abort(403, 'Unauthorized action.');
		}	
	}
}