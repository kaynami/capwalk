<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\MediaController;

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
Route::get('singkong-butas-about', HomeController::class . '@about')->name('homepage.about');
Route::get('singkong-butas-contact', HomeController::class . '@contact')->name('homepage.contact');
Route::get('singkong-butas-{category}/{pointer}', HomeController::class . '@post')->name('homepage.post');
Route::get('singkong-butas-{category}', HomeController::class . '@filter')->name('homepage.filter');

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
        Route::get('show/{id}', PostsController::class . '@show')->name('posts.edit');
        Route::get('create', PostsController::class . '@create')->name('posts.create');
        Route::post('store', PostsController::class . '@store')->name('posts.store');
        Route::post('update/{id}', PostsController::class . '@update')->name('post.update');
        Route::get('delete/{id}', PostsController::class . '@destroy')->name('post.delete');
        Route::post('table', PostsController::class . '@table')->name('posts.get');
        Route::get('/', PostsController::class . '@index')->name('posts');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('store', CategoryController::class . '@store')->name('category.store');
        Route::get('delete/{id}', CategoryController::class . '@destroy')->name('category.delete');
        Route::post('table', CategoryController::class . '@table')->name('category.table');
        Route::get('/', CategoryController::class . '@index')->name('category');
    });

    Route::group(['prefix' => 'aboutme'], function () {
        Route::post('save', AboutMeController::class . '@store')->name('aboutme.save');
        Route::get('/', AboutMeController::class . '@index')->name('aboutme');
    });

    Route::group(['prefix' => 'media'], function () {
        Route::get('delete/{id}', MediaController::class . '@destroy')->name('media.delete');
        Route::post('upload', MediaController::class . '@upload')->name('media.upload');
        Route::get('/', MediaController::class . '@index')->name('media');
    });

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
});
