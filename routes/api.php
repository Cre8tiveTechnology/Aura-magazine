<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

/* -------------------------------------------------------------------------- */
/*                                Articles API                                */
/* -------------------------------------------------------------------------- */
Route::group(['name' => 'article.', 'prefix' => 'article', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/all', 'ArticleController@adminIndex')->name('all');
    Route::post('/create/{user}', 'ArticleController@store')->name('store');
    Route::put('/update/{article}', 'ArticleController@update')->name('update');
    Route::delete('/remove/{article}', 'ArticleController@destroy')->name('remove');
    Route::post('/restore', 'ArticleController@restore')->name('restore');
});

/* -------------------------------------------------------------------------- */
/*                                Roles API                                */
/* -------------------------------------------------------------------------- */
Route::group(['name' => 'role.', 'prefix' => 'role', 'middleware' => ['auth:sanctum', 'role:superadmin']], function () {
    Route::get('/all', 'RoleController@index')->name('all');
    Route::get('/rolesIndex', 'RoleController@rolesIndex')->name('rolesIndex');
    Route::post('/new/create', 'RoleController@store')->name('store');
    Route::put('/update/{role}', 'RoleController@update')->name('update');
    Route::delete('/remove/{role}', 'RoleController@destroy')->name('remove');
    Route::post('/restore', 'RoleController@restore')->name('restore');
});

/* -------------------------------------------------------------------------- */
/*                                Users API                                */
/* -------------------------------------------------------------------------- */
Route::group(['name' => 'user.', 'prefix' => 'user', 'middleware' => ['auth:sanctum', 'role:superadmin']], function () {
    Route::get('/all', 'UserController@index')->name('all');
    Route::put('/update/{user}', 'UserController@update')->name('update');
    Route::delete('/remove/{user}', 'UserController@destroy')->name('remove');
    Route::post('/restore', 'UserController@restore')->name('restore');
});

/* -------------------------------------------------------------------------- */
/*                                Invoices API                                */
/* -------------------------------------------------------------------------- */
Route::group(['name' => 'invoice.', 'prefix' => 'invoice', 'middleware' => ['auth:sanctum']], function () {
    Route::get('/all', 'InvoiceController@index')->name('all');
    Route::post('/create/{user}', 'InvoiceController@store')->name('store');
    Route::put('/update/{invoice}', 'InvoiceController@update')->name('update');
    Route::delete('/remove/{invoice}', 'InvoiceController@destroy')->name('remove');
    Route::post('/restore', 'InvoiceController@restore')->name('restore');
});


/* -------------------------------------------------------------------------- */
/*                                Adverts API                                */
/* -------------------------------------------------------------------------- */
Route::group(['name' => 'advert.', 'prefix' => 'advert', 'middleware' => ['auth:sanctum']], function () {
    Route::get('/all', 'AdvertsController@index')->name('all');
    Route::post('/create/{user}', 'AdvertsController@store')->name('store');
    Route::delete('/remove/{adverts}', 'AdvertsController@destroy')->name('remove');
    Route::post('/restore', 'AdvertsController@restore')->name('restore');
});

/* -------------------------------------------------------------------------- */
/*                               Auth API Routes                              */
/* -------------------------------------------------------------------------- */
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return auth()->user();
});

Route::post('/register', 'RegisterController@register');
Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout')->name('logout');

/* -------------------------------------------------------------------------- */
/*                               NonAuth-User Routes                              */
/* -------------------------------------------------------------------------- */
Route::get('/articles/{category}/fetch', 'ArticleController@index')->name('fetch_articles');
Route::get('/articles/{article}/get', 'ArticleController@show')->name('get_article');
Route::get('/articles/all', 'ArticleController@homeIndex')->name('all');
Route::post('articles/updateviews', 'ArticleController@updateViews')->name('updateviews');
Route::get('/articles/author/{user}/get', 'ArticleController@authorArticles')->name('author_articles');
