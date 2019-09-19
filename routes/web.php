<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => '/', 'namespace' => '_Static', 'as' => 'static'], function () 
{
	
	Route::group(['prefix' => '/', 'namespace' => 'Guest', 'as' => '.guest'], function () 
	{
		Route::get('/wall', 'WallController@index')->name('.wall');
		Route::get('/login', 'LoginController@index')->name('.login');
		Route::get('/register', 'RegisterController@index')->name('.register');
		Route::get('/reset-password', 'ResetPasswordController@index')->name('.reset-password');
	});
});