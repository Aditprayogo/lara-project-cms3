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

Route::get('/', 'HomeController@index')
	->name('home.index');

Route::get('/post/{slug}', 'DetailController@index')
	->name('post.detail');


Route::get('/categories/{id}/posts', 'CategoryPostController@postByCategory')
	->name('category.posts.detail');

Route::group(['middleware' => 'auth'], function () {
	
	Route::prefix('admin')
		->namespace('admin')
		->group(function () {

			Route::get('/', 'DashboardController@index')
				->name('dashboard.index');

			Route::resource('user', 'UserController', ['except' => ['show']]);

			Route::resource('post', 'PostController');

			Route::resource('category', 'CategoryController');
			
			Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);

			Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
			
			Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

			Route::get('/ajax/categories/search', 'CategoryController@ajaxSearch');

	});	
});

Route::get('/about', 'AboutController@index')
	->name('about.index');
	
Route::get('/contact', 'ContactController@index')
	->name('contact.index');

Auth::routes();

