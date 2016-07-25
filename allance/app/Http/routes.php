<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//展示首页面
Route::get('/', 'IndexController@index');
Route::get('/index', 'IndexController@index');
Route::get('/indexPage', 'IndexController@page');

//公共页面
Route::get('/top', 'PublicController@top');
Route::get('/footer', 'PublicController@footer');

//登录页面
Route::any('/login', 'LoginController@login');
Route::any('/doLogin', 'LoginController@doLogin');


//注册页面
Route::any('/register', 'LoginController@register');
Route::any('/doRegister', 'LoginController@doRegister');


//简历列表页面
Route::any('/resumes', 'ResumesController@index');
Route::any('/resumeslist', 'ResumesController@showlist');

/**
 * 企业信息
 */
Route::any('/ComMessage', 'CommessageController@ComMessage');