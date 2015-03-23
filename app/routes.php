<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::filter('admin','AuthFilter@admin');

Route::when('admin/*','admin');
Route::when('admin','admin');

Route::filter('architect','AuthFilter@architect');

Route::when('architect/*','architect');
Route::when('architect/','architect');

/* Login Controller */
Route::get('/','LoginController@showLogin');
Route::get('/login','LoginController@showLogin');
Route::post('/login','LoginController@login');

/* Admin Controller */
//Additional route. para lang pogi
Route::get('/admin','UserController@index');
Route::resource('/admin/users', 'UserController');
Route::get('/admin/users/search/user','UserController@search');

Route::resource('/admin/projects', 'ProjectController');
Route::get('/admin/projects/search/project','ProjectController@search');
Route::get('/admin/projects/add/users/{id}','ProjectController@addUser');
Route::get('/admin/project/{projectId}/user/{userId}','ProjectController@storeUserToProject');
Route::get('/admin/project/{projectId}/user/{userId}/delete','ProjectController@removeUser');

Route::resource('/admin/suppliers', 'SuppliersController');
Route::get('/admin/suppliers/search/supplier','SuppliersController@search');

Route::get('/logout','LoginController@logout');

/*Architect*/

Route::get('/architect','QuotationController@showProjects');
Route::get('/architect/quotations','QuotationController@showQuotations');
Route::get('/architect/quotation/create/{id}','QuotationController@create');
Route::post('/architect/quotation/create/{id}','QuotationController@store');
Route::get('/architect/quotation/view-project/{id}','QuotationController@viewProject');
Route::get('/architect/quotation/edit/{id}','QuotationController@edit');
Route::post('/architect/quotation/edit/{id}','QuotationController@update');
Route::get('/architect/quotation/view/{id}','QuotationController@view');
Route::post('/architect/quotation/tag-as-for-approval/{id}', 'QuotationController@changeStatus');
Route::get('/architect/viewer/view-other/{id}','EntryController@show');

Route::get('/architect/entry/create/{id}','EntryController@create');
Route::post('/architect/entry/create/{id}','EntryController@store');
Route::get('/architect/entry/delete/{id}','EntryController@remove');
Route::get('/architect/viewer','QuotationController@viewOtherQuotations');
Route::get('/architect/viewer/disapprove/{id}', 'QuotationController@disapprove');
Route::get('/architect/viewer/approve/{id}','QuotationController@approve');

Route::get('/admin/quotation/view/{id}','EntryController@showPrinterFriendly');
Route::get('/admin/project/add-active-quotation/{projectId}/{quotationId}','ProjectController@setAsActiveQuotation');
Route::post('/admin/project/change-status/{id}','ProjectController@changeStatus');

Route::get('/admin/budget/{id}','BudgetsController@index');
Route::get('/admin/budget/create/{id}','BudgetsController@create');
Route::post('/admin/budget/{id}','BudgetsController@store');
Route::get('/admin/budget/delete/{id}', 'BudgetsController@destroy');
Route::get('/admin/budget/update/{id}','BudgetsController@edit');

Route::get('/architect/change-password','LoginController@changeArchitectPassword');
Route::get('/admin/change-password','LoginController@changeAdminPassword');

Route::post('/architect/change-password','LoginController@updateArchitectPassword');
Route::post('/admin/change-password','LoginController@updateAdminPassword');
Route::post('/architect/entry/add-expenses/{id}','EntryController@addOtherExpenses');
Route::get('/architect/entry/remove-expenses/{id}','EntryController@removeExpenses');
Route::post('/architect/quotation/updateAdjustment/{id}','QuotationController@updateAdjustment');
Route::get('/ajax/get-subs','EntryController@getAllSubHeaders');
Route::get('/admin/quotation/request-for-update/{id}','ProjectController@requestForUpdate');
Route::get('/admin/materials','MaterialsController@index');

/* for design */
$template = 'template';
Route::get('/admin/quotation/create', function() use ($template)
{
	View::name($template, 'admin.quotation.create');
	$layout = View::of('admin.quotation.create');
	return $layout->nest('content', 'admin.quotation.create');
});

/*Route::get('/admin/budgets', function() use ($template)
{
	View::name($template, 'admin.budgets.index');
	$layout = View::of('admin.budgets.index');
	return $layout->nest('content', 'admin.budgets.index');
});*/

Route::get('/admin/budgets/create', function() use ($template)
{
	View::name($template, 'admin.budgets.create');
	$layout = View::of('admin.budgets.create');
	return $layout->nest('content', 'admin.budgets.create');
});

Route::get('/admin/dashboard', function() use ($template)
{
	View::name($template, 'admin.dashboard');
	$layout = View::of('admin.dashboard');
	return $layout->nest('content', 'admin.dashboard');
});

$archtemplate = 'architecttemplate';

Route::get('/architect/index', function() use ($archtemplate)
{
	View::name($archtemplate, 'architect.quotation.index');
	$layout = View::of('architect.quotation.index');
	return $layout->nest('content', 'architect.quotation.index');
});

$sectemplate = 'secretarytemplate';
Route::get('/secretary/test', function() use ($sectemplate)
{
	View::name($sectemplate, 'secretary.materials.index');
	$layout = View::of('secretary.materials.index');
	return $layout->nest('content', 'secretary.materials.index');
});

/* END */
