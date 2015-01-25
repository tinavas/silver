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







/*this block is for no controller or resources. Viewing of design*/
$template = 'template';
Route::get('/admin/quotation/create', function() use ($template)
{
	View::name($template, 'admin.quotation.create');
	$layout = View::of('admin.quotation.create');
	return $layout->nest('content', 'admin.quotation.create');
});
/*END*/