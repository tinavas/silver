<?php namespace Bagito\Auth;

use Sentry;

class AuthFilterImpl implements AuthFilterRepository{
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

	public function secretary()
	{
		if(Sentry::check())
		{
			$user = Sentry::getUser();
			$secretary = Sentry::getfindGroupByName('Secretary');
			if(!$user->inGroup($secretary))
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