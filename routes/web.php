<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'namespace' => 'Backend',
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {

    include_route_files(__DIR__ . '/backend/');
});

Route::group([
    'namespace' => 'Frontend',
    'as' => 'user.',
], function () {

    include_route_files(__DIR__ . '/frontend/');
});

Route::any('/logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('admin')->group(function () {
    Auth::routes();
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
