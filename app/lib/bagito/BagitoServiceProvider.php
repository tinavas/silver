<?php namespace Bagito;

use Illuminate\Support\ServiceProvider;

class BagitoServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind('Bagito\Auth\AuthRepository','Bagito\Auth\SentryAuthRepository');
		$this->app->bind('Bagito\Auth\AuthFilterRepository','Bagito\Auth\SentryAuthFilterRepository');
		$this->app->bind('Bagito\Storage\UserRepository','Bagito\Storage\EloquentUserRepository');
	}
}