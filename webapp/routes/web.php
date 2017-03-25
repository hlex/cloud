<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::get('/test', 'TestController@index');

include('api/masterconfig.php');

Route::group(['middleware' => ['web']], function() {

// Test Routes...
  Route::group(['namespace' => 'FrontEnd'], function(){
    Route::get('about', ['as' => 'about', 'uses' => 'AboutController@index']);
    Route::get('product', ['as' => 'product', 'uses' => 'ProductController@index']);
    Route::get('contact', ['as' => 'contact', 'uses' => 'ContactController@index']);
  });
// Login Routes...
  Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
  Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
  Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
  Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
  Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
  Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
  Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
  Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
  Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});

Route::group(['middleware' => ['auth', 'web']], function() {
  Route::group(['prefix' => 'backoffice', '', 'namespace' => 'Backend'], function(){
    Route::get('/', 'DashboardController@index');
    Route::resource('/dashboard', 'DashboardController');
    Route::resource('/product', 'ProductController');
    Route::resource('/user', 'UserController');
    Route::resource('/setting', 'SettingController');
    Route::group(['middleware' => 'role:masteradmin'], function() {
    });
  });
});
