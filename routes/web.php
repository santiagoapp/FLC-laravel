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

Route::get('/home', 'HomeController@index')->name('home');

Route::group( ['middleware' => ['auth']], function() {
	Route::resource('OT', 'OTController');
	Route::resource('RQ', 'RQController');
	Route::resource('OC', 'OCController');
	Route::resource('OS', 'OSController');
	Route::resource('RE', 'REController');
	Route::resource('RV', 'RVController');
});