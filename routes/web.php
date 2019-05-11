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

Route::group(['middleware' => 'web'], function () {

    Route::match(['GET', 'POST'], '/', ['uses' => 'IndexController@execute', 'as' => 'home']);
    Route::get('.page/{alias}', ['uses' => 'PageController@execute', 'as' => 'page']);
    //Admin Routes
    Route::auth();
});

//Admin Routes------------------------------------------------------------------
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    //admin
    Route::get('/', function () {

    });
    //---------------------------------------------
    Route::group(['prefix' => 'pages'], function () {

            Route::get('/', ['uses' => 'PagesController@execute', 'as' => 'pages']);
            Route::match(['GET', 'POST'], '/add', ['uses' => 'PagesAddController@execute', 'as' => 'pagesAdd']);
            Route::match(['GET', 'POST', 'DELETE'], '/edit/{page}', ['uses' => 'PagesEditController@execute',
                'as' => 'pagesEdit']);
        });
    //----------------------------------------------
    Route::group(['prefix' => 'portfolios'], function () {

        Route::get('/', ['uses' => 'PortfolioController@execute', 'as' => 'portfolio']);
        Route::match(['GET', 'POST'], '/add', ['uses' => 'PortfolioAddController@execute', 'as' => 'portfolioAdd']);
        Route::match(['GET', 'POST', 'DELETE'], '/edit/{portfolio}', ['uses' => 'PortfolioEditController@execute',
            'as' => 'portfolioEdit']);
    });
    //----------------------------------------------
    Route::group(['prefix' => 'services'], function () {

        Route::get('/', ['uses' => 'ServicesController@execute', 'as' => 'services']);
        Route::match(['GET', 'POST'], '/add', ['uses' => 'ServicesAddController@execute', 'as' => 'servicesAdd']);
        Route::match(['GET', 'POST', 'DELETE'], '/edit/{services}', ['uses' => 'ServicesEditController@execute',
            'as' => 'servicesEdit']);
    });
});
