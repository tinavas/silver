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
		$this->app->bind('Bagito\Storage\EntryRepository','Bagito\Storage\EloquentEntryRepository');
		$this->app->bind('Bagito\Storage\ApprovalRepository','Bagito\Storage\EloquentApprovalRepository');
		$this->app->bind('Bagito\Storage\BudgetRepository','Bagito\Storage\EloquentBudgetRepository');
		$this->app->bind('Bagito\Storage\SupplierRepository','Bagito\Storage\EloquentSupplierRepository');
		$this->app->bind('Bagito\Storage\NotificationRepository','Bagito\Storage\EloquentNotificationRepository');
		$this->app->bind('Bagito\Storage\ValueRepository','Bagito\Storage\EloquentValueRepository');
		$this->app->bind('Bagito\Storage\OtherExpensesRepository','Bagito\Storage\EloquentOtherExpensesRepository');
		$this->app->bind('Bagito\Storage\ExpensesValueRepository','Bagito\Storage\EloquentExpensesValueRepository');
		$this->app->bind('Bagito\Storage\MaterialRepository','Bagito\Storage\EloquentMaterialRepository');
	}
}