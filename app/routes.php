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

Route::get('/logout','LoginController@logout');

/*Architect*/

Route::get('/architect','QuotationController@showProjects');
Route::get('/architect/quotations','QuotationController@showQuotations');
Route::get('/architect/quotation/create/{id}','QuotationController@create');
Route::post('/architect/quotation/create/{id}','QuotationController@store');
Route::get('/architect/quotation/view-project/{id}','QuotationController@viewProject');

/* for design */
$template = 'template';
Route::get('/admin/quotation/create', function() use ($template)
{
	View::name($template, 'admin.quotation.create');
	$layout = View::of('admin.quotation.create');
	return $layout->nest('content', 'admin.quotation.create');
});

$template = 'template';
Route::get('/admin/dashboard', function() use ($template)
{
	View::name($template, 'admin.dashboard');
	$layout = View::of('admin.dashboard');
	return $layout->nest('content', 'admin.dashboard');
});

$archtemplate = 'architecttemplate';
Route::get('/architect/create', function() use ($archtemplate)
{
	View::name($archtemplate, 'architect.quotation.create');
	$layout = View::of('architect.quotation.create');
	return $layout->nest('content', 'architect.quotation.create');
});

Route::get('/architect/index', function() use ($archtemplate)
{
	View::name($archtemplate, 'architect.quotation.index');
	$layout = View::of('architect.quotation.index');
	return $layout->nest('content', 'architect.quotation.index');
});

/* END */
