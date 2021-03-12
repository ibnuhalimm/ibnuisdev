<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'lang'
], function() {
    Route::get('/', 'PageController@index')->name('index');
    Route::get('portfolio', 'PageController@portfolio')->name('portfolio');
    Route::get('resume', 'PageController@resume')->name('resume');
    Route::get('contact', 'PageController@contact')->name('contact');
});

Route::get('id', 'PageController@changeLangeToId');
Route::get('en', 'PageController@changeLangeToEn');

Route::name('blog.')
    ->prefix('blog')
    ->namespace('Blog')
    ->middleware('lang')
    ->group( function() {
        Route::get('/', 'PageController@index')->name('index');
        Route::get('/search', 'PageController@searchPost')->name('post.search');
        Route::get('/{slug?}/{mode?}', 'PageController@postRead')->name('post.read');
    });

Auth::routes(['logout' => false, 'register' => false, 'verify' => false]);
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::name('dashboard.')
    ->prefix('home')
    ->middleware('auth')
    ->namespace('Dashboard')
    ->group( function() {
        Route::get('section', 'SectionController@index')->name('section.index');

        Route::get('portfolio', 'PortfolioController@index')->name('portfolio.index');
        Route::get('portfolio/create', 'PortfolioController@create')->name('portfolio.create');
        Route::get('portfolio/edit/{id}', 'PortfolioController@edit')->name('portfolio.edit');

        Route::get('skills', 'SkillsController@index')->name('skills.index');
        Route::get('message', 'MessageController@index')->name('message.index');

        Route::get('post', 'PostController@index')->name('post.index');
        Route::get('post/create', 'PostController@create')->name('post.create');
        Route::post('post/upload-image', 'PostController@uploadImageCkeditor')->name('post.upload-image');
        Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit');

        Route::get('share-button', 'ShareButtonController@index')->name('share-button.index');
        Route::get('share-button/create', 'ShareButtonController@create')->name('share-button.create');
        Route::get('share-button/edit/{id}', 'ShareButtonController@edit')->name('share-button.edit');

        Route::get('old-page', 'OldPageController@index')->name('old-page.index');

        Route::get('profile', 'ProfileController@index')->name('profile.index');
    });


Route::get('{old_slug?}', 'RedirectOldPageController@index')->where('old_slug', '.*')->name('redirect-old-page');