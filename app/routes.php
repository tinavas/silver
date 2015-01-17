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
Route::resource('/admin/users', 'UserController@index');
Route::get('/admin/users/create','UserController@create');