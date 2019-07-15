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
Route::get('/','ItemController@index')->name('item.list');
Route::get('/detail/{item}','ItemController@detail')->name('item.detail');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::view('home','admin.home')->name('admin.home')->middleware('auth:admin');
    Route::get('login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login','Auth\AdminLoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
});