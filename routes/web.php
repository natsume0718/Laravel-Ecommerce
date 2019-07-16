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
    Route::get('login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login','Auth\AdminLoginController@login');
    Route::middleware(['auth:admin'])->group(function () {
        Route::view('home','admin.home')->name('admin.home');
        Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
        //商品リスト
        Route::get('/','AdminItemController@index')->name('admin.item.list');
        //商品詳細
        Route::get('/detail/{item}','AdminItemController@detail')->name('admin.item.detail');
        //商品追加
        Route::get('/add','AdminItemController@show')->name('admin.item.add');
        Route::post('/add','AdminItemController@add');
        //商品編集
        Route::get('/edit/{item}','AdminItemController@edit')->name('admin.item.edit');
        Route::patch('/edit/{item}','AdminItemController@update');
    });   
});