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

// untuk halaman admin
Route::get('/login-admin', 'LoginController@index')->name('loginadmin');

// untuk halaman user
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about','AboutController@index')->name('about');

// akhir halaman user

Route::get('/data', 'HomeController@data')->name('data');
Route::get('/store', 'HomeController@store')->name('store');
// route tambah data user 
Route::get('/home_user', 'UserController@index')->name('user');
Route::get('/data_user', 'UserController@data')->name('data_user');
Route::get('/data_store', 'UserController@store')->name('store_user');



