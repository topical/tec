<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web', 'auth']], function () {
	Route::get('/', function () {
    	return view('welcome');
	});
	Route::get('/home', function () {
		return redirect('/');
	});
    Route::resource('/subject', 'SubjectController');
    Route::resource('/school', 'SchoolController');
    Route::resource('/pupil', 'PupilController');
    Route::get('/circle/{circle}/analyze', 'CircleController@analyze');
    Route::resource('/circle', 'CircleController');
    Route::resource('/schoolyear', 'SchoolYearController', [
    	'only' => ['index', 'store']
    ]);
    Route::resource('/batch', 'BatchController');
    Route::get('/registration/add', 'RegistrationController@add');
    Route::get('/registration/remove', 'RegistrationController@remove');
});

Route::group(['middleware' => 'web'], function () {
	Route::auth();
});

Route::group(['middleware' => ['web', 'auth', 'admin']], function () {
	Route::resource('/user', 'UserController');
});