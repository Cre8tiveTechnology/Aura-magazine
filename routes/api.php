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
    Route::delete('/remove/{article}', 'ArticleController@destroy')->name('remove');
    Route::post('/restore', 'ArticleController@restore')->name('restore');
});

/* -------------------------------------------------------------------------- */
/*                                Roles API                                */
/* -------------------------------------------------------------------------- */
Route::group(['name' => 'role.', 'prefix' => 'role', 'middleware' => ['auth:sanctum', 'role:superadmin']], function () {
    Route::get('/all', 'RoleController@index')->name('all');
    Route::post('/create', 'RoleController@store')->name('store');
    Route::delete('/remove/{role}', 'RoleController@destroy')->name('remove');
    Route::post('/restore', 'RoleController@restore')->name('restore');
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
Route::post('articles/updateviews', 'ArticleController@updateViews')->name('updateviews');