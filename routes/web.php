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

//这里定义后台的路由组
Route::group(['prefix'=>'admin'], function(){
    //定义后台首页路由
    Route::get('index','Admin\IndexController@index');
    //定义welcome(我的桌面)的路由
    Route::get('welcome','Admin\IndexController@welcome');
});

//登录页面的路由
Route::match(['get','post'],"/admin/login", 'Admin\IndexController@login');
//退出登录的路由
Route::match(['get','post'],'/admin/logout', 'Admin\IndexController@logout');

