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


$template = 'template';
Route::get('/', function() use ($template)
{
	View::name($template, 'template');
	$layout = View::of('template');
	return $layout->nest('content', 'template');
});

Route::get('/','LoginController@showLogin');
Route::get('/index','LoginController@showLogin');

