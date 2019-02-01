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

// back routes, BackController is the main controller for the back end of the application

Route::group(['middleware' => ['guest']], function() {
	Route::prefix('owl')->group(function () {

		Route::get('/', 'Backend\LandingController@login');
		Route::post('/authenticate', 'Backend\LandingController@authenticate');
	});
});

Route::group(['middleware' => ['auth']], function() {
	Route::prefix('owl')->group(function () {

		Route::get('/logout', ['as' => 'owl/logout', 'uses' => 'Backend\LandingController@logout']);
		Route::get('/dashboard', ['as' => 'owl/dashboard', 'uses' => 'Backend\LandingController@index']);
		Route::get('/settings', ['as' => 'owl/settings', 'uses' => 'Backend\SettingsController@index'])->middleware("role:admin,manager");
		
		// pages routes
		Route::prefix('users')->group(function () {
			Route::get('/', ['as' => 'owl/users', 'uses' => 'Backend\UsersController@index']);
			Route::get('/profile/{id}', ['as' => 'owl/users/profile', 'uses' => 'Backend\UsersController@userProfile'])->middleware("role:admin,manager");
			Route::get('/add', ['as' => 'owl/users/add', 'uses' => 'Backend\UsersController@userAdd'])->middleware("role:admin,manager");
			Route::get('/edit/{id}', ['as' => 'owl/users/edit', 'uses' => 'Backend\UsersController@userEdit'])->middleware("role:admin,manager");
			Route::get('/delete/{id}', ['as' => 'owl/users/delete', 'uses' => 'Backend\UsersController@userDelete'])->middleware("role:admin,manager");

			Route::post('/create', 'Backend\UsersController@create');
			Route::post('/update', 'Backend\UsersController@update');
			Route::post('/delete', 'Backend\UsersController@delete');
		});

		// posts routes
		Route::prefix('posts')->group(function () {
			Route::get('/', ['as' => 'owl/posts', 'uses' => 'Backend\PostsController@index'])->middleware("role:admin,manager,editor");
			Route::get('/add', ['as' => 'owl/posts/add', 'uses' => 'Backend\PostsController@add'])->middleware("role:admin,manager,editor");
			Route::get('/edit', ['as' => 'owl/posts/edit', 'uses' => 'Backend\PostsController@edit'])->middleware("role:admin,manager,editor");
			Route::get('/delete', ['as' => 'owl/posts/delete', 'uses' => 'Backend\PostsController@delete'])->middleware("role:admin,manager,editor");
		});

		// pages routes
		Route::prefix('pages')->group(function () {
			Route::get('/', ['as' => 'owl/pages', 'uses' => 'Backend\PagesController@index'])->middleware("role:admin,manager,editor");
			Route::get('/add', ['as' => 'owl/pages/add', 'uses' => 'Backend\PagesController@add'])->middleware("role:admin,manager,editor");
		});

		// media routes
		Route::prefix('media')->group(function () {
			Route::get('/', ['as' => 'owl/media', 'uses' => 'Backend\MediaController@index'])->middleware("role:admin,manager,editor");
			Route::get('/add', ['as' => 'owl/media/add', 'uses' => 'Backend\MediaController@add'])->middleware("role:admin,manager,editor");
		});

		// profile routes
		Route::prefix('profile')->group(function () {
			Route::get('/', ['as' => 'owl/profile', 'uses' => 'Backend\ProfileController@index'])->middleware("role:admin,manager,editor");
		});
		
	});
});

// front routes, FrontController is the main controller for the front end of the application
Route::get('/', 'Frontend\LandingController@index');


