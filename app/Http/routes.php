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

Route::get('/', function () {
    return view('welcome');
});

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

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::resource('/subject', 'SubjectController');
    Route::resource('/school', 'SchoolController');
    Route::resource('/pupil', 'PupilController');
    Route::resource('/user', 'UserController');
    Route::resource('/circle', 'CircleController');
    Route::resource('/schoolyear', 'SchoolYearController', [
    	'only' => ['index', 'store']
    ]);
    Route::resource('/batch', 'BatchController');
    Route::get('/registration/add', 'RegistrationController@add');
    Route::get('/registration/remove', 'RegistrationController@remove');
});
	