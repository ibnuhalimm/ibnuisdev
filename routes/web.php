<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index')->name('index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
