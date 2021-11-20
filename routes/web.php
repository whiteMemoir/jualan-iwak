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

use App\Http\Controllers\CommodityController;

Route::get('/', 'HomeController@index');


Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'admin\DashboardController@index');
        Route::resource('/item', 'admin\ItemController');
        Route::resource('/carousel', 'admin\CarouselController');
        Route::resource('/commodity', 'admin\CommodityController');
        Route::resource('/setting', 'admin\SettingController');
        Route::resource('/social-media', 'admin\SocialMediaController');
        Route::resource('/tentang-kami', 'admin\TentangKamiController');
        Route::get('/dashboard', 'admin\DashboardController@index');
    });
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/items', 'ItemController@index');
Route::get('/items/{slug}', 'ItemController@index');

Route::prefix('api')->group(function () {
    Route::get('/items/{komoditas}', 'ItemController@getItems');
});
