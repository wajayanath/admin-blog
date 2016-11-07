<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function () {
	Route::get('/', function ()
	{
	    return view('welcome');
	});
	Route::auth();
	Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => 'admin'], function () {
	Route::group(['middleware' => 'auth:admin'], function ()
	{
		Route::get('/admin', 'AdminController@index');
	});
	Route::get('/admin/login', 'AdminController@login');
	Route::post('/admin/login', 'AdminController@postLogin');
	Route::get('/admin/logout', 'AdminController@logout');
});