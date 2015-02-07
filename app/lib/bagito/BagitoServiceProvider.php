<?php namespace Bagito;

use Illuminate\Support\ServiceProvider;

class BagitoServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind('Bagito\Auth\AuthRepository','Bagito\Auth\SentryAuthRepository');
		$this->app->bind('Bagito\Storage\UserRepository','Bagito\Storage\EloquentUserRepository');
		$this->app->bind('Bagito\Storage\QuotationRepository','Bagito\Storage\EloquentQuotationRepository');
		$this->app->bind('Bagito\Storage\ProjectRepository','Bagito\Storage\EloquentProjectRepository');
		$this->app->bind('Bagito\Storage\UserLoadRepository','Bagito\Storage\EloquentUserLoadRepository');
	}
}