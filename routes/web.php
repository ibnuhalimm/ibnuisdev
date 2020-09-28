<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index')->name('index');

Auth::routes(['logout' => false, 'register' => false, 'verify' => false]);
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::name('dashboard.')
->prefix('home')
->middleware('auth')
->namespace('Dashboard')
->group( function() {
    Route::get('section', 'SectionController@index')->name('section.index');
});
