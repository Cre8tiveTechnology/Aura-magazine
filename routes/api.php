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
/*                                Artilces API                                */
/* -------------------------------------------------------------------------- */
Route::group(['name' => 'article.', 'prefix' => 'article', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/all', 'ArticleController@index')->name('all');
    Route::post('/create/{user}', 'ArticleController@store')->name('store');
});

/* -------------------------------------------------------------------------- */
/*                               Auth API Routes                              */
/* -------------------------------------------------------------------------- */
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return auth()->user();
});
Route::post('/register', 'RegisterController@register');
Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout');
