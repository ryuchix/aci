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

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

	Route::resource('dashboard/departments', 'DepartmentController');

	Route::resource('dashboard/users', 'UserController');

	Route::get('/dashboard/users/change-password/{id}', 'UserController@changePassword');

	Route::post('/dashboard/users/update-password', 'UserController@updatePassword');

	Route::resource('dashboard/reports', 'ReportController');

	Route::get('/reports/download/{id}', 'ReportController@download');

	Route::get('/logout', 'HomeController@logout')->name('logout');

	Route::post('/clear-notifications', 'HomeController@clear');

	Route::post('/mark-as-read', 'HomeController@read');

});


