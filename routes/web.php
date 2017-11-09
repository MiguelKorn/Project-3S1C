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

// Portfolio (Home) Routes
Route::get('/', 'PortfolioController@index')->name('portfolio.home');

Route::get('/language/{lang}', 'LanguageController@switchLanguage')->name('lang.switch');

// CV Routes
Route::group(['prefix' => 'cv'], function () {
    Route::get('/', 'CvController@index')->name('cv.home');
});

// BnB Routes
Route::group(['prefix' => 'bnb'], function () {
// Authentication Routes...
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login')->name('login.submit');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/', 'BnbController@index')->name('bnb.home');
});

// CMS Routes
Route::group(['prefix' => 'cms'], function () {
    Route::get('/login', 'Auth\AdminLoginController@showLogin')->name('cms.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('cms.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('cms.logout');

    Route::group(['prefix' => 'pages'], function () {
        Route::get('/{pageName}/tabs', 'CmsController@getTabs')->name('cms.pages.tabs');
        Route::post('/{pageName}', 'CmsController@editPage')->name('cms.pages.change');
        Route::get('/', 'CmsController@getPages')->name('cms.pages');
    });

    Route::get('/', 'CmsController@index')->name('cms.home');
});