<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index')->name('index');

Auth::routes(['logout' => false, 'register' => false, 'verify' => false]);
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');
Route::get('/home', 'HomeController@index')->name('home');
