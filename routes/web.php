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


Route::group(['prefix' => '/', 'namespace' => 'Api', 'as' => 'static'], function () 
{
	
	Route::group(['prefix' => '/', 'namespace' => 'Guest', 'as' => '.guest'], function () 
	{
		Route::get('/wall', 'WallController@index')->name('.wall');
		Route::get('/login', 'LoginController@index')->name('.login');
		Route::post('/login', 'LoginController@auth')->name('.login.auth');

		//register
		Route::get('/register', 'RegisterController@index')->name('.register');
		Route::post('/register', 'RegisterController@register')->name('.register');
		Route::get('/email/verify/{id}/{hash}', 'RegisterController@verify')->name('.register.verify');

		Route::get('/reset-password', 'ResetPasswordController@index')->name('.reset-password');
	});

	Route::group(['prefix' => '/user', 'namespace' => 'User', 'as' => '.user'], function () 
	{
		Route::group(['prefix' => '/account', 'namespace' => 'Account', 'as' => '.account'], function () 
		{
			Route::get('/update-password', 'UpdatePasswordController@index')->name('.update-password');
		});

		Route::group(['prefix' => '/item', 'namespace' => 'Item', 'as' => '.item'], function () 
		{
			Route::get('/all', 'AllController@index')->name('.all');
			Route::get('/create', 'CreateController@index')->name('.create');
			Route::get('/edit', 'EditController@index')->name('.edit');
		});
	});
});