<?php

use Illuminate\Support\Facades\Route;

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

//Admin routes
Route::group(['middleware' => 'admin'], function(){

	Route::group(['middleware' => 'auth:admin'], function(){
		Route::get('/admin', 'AdminController@index');
	});
	
	Route::get('/admin/login', 'AdminController@login');
	Route::post('/admin/postLogin', 'AdminController@postLogin')->name('admin.postLogin');
	Route::get('/admin/logout', 'AdminController@logout');
});

//User routes

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

