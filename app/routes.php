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


Route::get('/login','LoginController@showLogin');
Route::get('/login','LoginController@showLogin');
$template = 'template';
Route::get('/', function() use ($template)
{
	View::name($template, 'template');
	$layout = View::of('template');
	return $layout->nest('content', 'template');
});

Route::get('admin/users', function(){return View::make('admin.users.view');});