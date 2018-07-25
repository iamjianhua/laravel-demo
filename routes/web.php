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

Route::group(['namespace' => 'Web'], function () {

    // 默认欢迎页。
    Route::get('/', function () {
        return view('welcome');
    });

    // 用户登录，注册，找回密码。
    Auth::routes();

    // 默认主页。
    Route::get('/home', 'DefaultsController@index')->name('home');

    //用户中心
    Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);

    // 话题分类。
    Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

    // 用户话题。
    Route::resource('topics', 'TopicsController');

    Route::get('/user/list', 'Auth\UserController@list_');

    //Test route
    Route::any('/mytest', function () {
        return view('mytest');
    });
});

/*Route::get('/blade', function () {
    return view('child');
});*/

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
