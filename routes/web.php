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

Route::get('/', 'HomeController@index')->name('homepage');
Route::get('about', 'HomeController@about')->name('homepage.about');
Route::get('contact', 'HomeController@contact')->name('homepage.contact');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::any('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.request');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'posts'], function () {
        Route::get('show/{id}', 'PostsController@show')->name('posts.edit');
        Route::get('create', 'PostsController@create')->name('posts.create');
        Route::post('store', 'PostsController@store')->name('posts.store');
        Route::post('update/{id}', 'PostsController@update')->name('post.update');
        Route::get('delete/{id}', 'PostsController@destroy')->name('post.delete');
        Route::post('table', 'PostsController@table')->name('posts.get');
        Route::get('/', 'PostsController@index')->name('posts');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('store', 'CategoryController@store')->name('category.store');
        Route::get('delete/{id}', 'CategoryController@destroy')->name('category.delete');
        Route::post('table', 'CategoryController@table')->name('category.table');
        Route::get('/', 'CategoryController@index')->name('category');
    });
    
    Route::group(['prefix' => 'aboutme'], function () {
        Route::post('save', 'AboutMeController@store')->name('aboutme.save');
        Route::get('/', 'AboutMeController@index')->name('aboutme');
    });
    
    Route::group(['prefix' => 'media'], function () {
        Route::get('delete/{id}', 'MediaController@destroy')->name('media.delete');
        Route::post('upload', 'MediaController@upload')->name('media.upload');
        Route::get('/', 'MediaController@index')->name('media');
    });

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
});
