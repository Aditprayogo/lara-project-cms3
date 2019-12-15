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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function () {
	
	Route::prefix('admin')
		->namespace('admin')
		->group(function () {

			Route::get('/', 'DashboardController@index')
				->name('dashboard.index');

			Route::resource('user', 'UserController', ['except' => ['show']]);

			Route::resource('post', 'PostController');

			Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);

			Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
			
			Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	});	
});


Auth::routes();

