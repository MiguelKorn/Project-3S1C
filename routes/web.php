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
//        Tabs
        Route::get('/{pageName}/tabs', 'Cms\TabController@getTabs')->name('cms.pages.tabs');
        Route::post('/{pageName}/tabs', 'Cms\TabController@editTab')->name('cms.pages.change');
//        Projects
        Route::get('/{pageName}/projects', 'Cms\ProjectController@listProjects')->name('cms.projects'); // list all
        Route::get('/{pageName}/projects/add', 'Cms\ProjectController@showAddProject')->name('cms.projects.add'); // add
        Route::post('/{pageName}/projects/add', 'Cms\ProjectController@addProject')->name('cms.projects.add.submit'); // add
        Route::get('/{pageName}/projects/{projectID}', 'Cms\ProjectController@getProject')->name('cms.projects.project'); // show
        Route::get('/{pageName}/projects/{projectID}/edit', 'Cms\ProjectController@showEditProject')->name('cms.projects.edit'); // edit
        Route::post('/{pageName}/projects/{projectID}/edit', 'Cms\ProjectController@editProject')->name('cms.projects.edit.submit'); // edit
        Route::get('/{pageName}/projects/{projectID}/delete', 'Cms\ProjectController@deleteProject')->name('cms.projects.delete'); // delete

//        Clients
        Route::get('/{pageName}/clients', 'Cms\ClientController@showAll')->name('cms.clients');
        Route::get('/{pageName}/clients/add', 'Cms\ClientController@showAddForm')->name('cms.clients.add');
        Route::post('/{pageName}/clients/add', 'Cms\ClientController@add')->name('cms.clients.add.submit');
        Route::get('/{pageName}/client/{clientID}', 'Cms\ClientController@showByID')->name('cms.clients.client');
        Route::get('/{pageName}/client/{clientID}/edit', 'Cms\ClientController@showEditForm')->name('cms.clients.edit');
        Route::post('/{pageName}/client/{clientID}/edit', 'Cms\ClientController@edit')->name('cms.clients.edit.submit');
        Route::get('/{pageName}/client/{clientID}/delete', 'Cms\ClientController@delete')->name('cms.clients.delete');

        Route::get('/{pageName}', 'Cms\PageController@showPageEditable')->name('cms.pages.page');
        Route::get('/', 'Cms\PageController@getPages')->name('cms.pages');
    });

    Route::get('/', 'Cms\CmsController@index')->name('cms.home');
});