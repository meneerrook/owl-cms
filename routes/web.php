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
		
		Route::get('/dashboard', 'Backend\LandingController@index');

		// main
		Route::get('/logout', 'Backend\LandingController@logout');
		

	});
});

// front routes, FrontController is the main controller for the front end of the application
Route::get('/', 'Frontend\LandingController@index');


