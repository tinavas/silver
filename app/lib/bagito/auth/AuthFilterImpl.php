<?php namespace Bagito\Auth\AuthFilter;

use Sentry;

class AuthFilterImpl implements AuthFilter{
	public function architect()
	{
		if(Sentry::check())
		{
			$user = Sentry::getUser();
			$architect = Sentry::getfindGroupByName('Architect');
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
			$admin = Sentry::getfindGroupByName('Admin');
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