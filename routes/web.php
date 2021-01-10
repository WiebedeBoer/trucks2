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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//nieuws
Route::get('news', 'App\Http\Controllers\NewsController@index');
Route::get('news/{news}', 'App\Http\Controllers\NewsController@show');
Route::get('news/{news}/edit', 'App\Http\Controllers\NewsController@edit');
Route::patch('news/{news}', 'App\Http\Controllers\NewsController@update');
Route::post('news/create','App\Http\Controllers\NewsController@create');
Route::post('news','App\Http\Controllers\NewsController@store');
Route::delete('news/{news}', 'App\Http\Controllers\NewsController@destroy');

//zoeken
Route::get('search', 'App\Http\Controllers\SearchController@index');
Route::get('search/{search}', 'App\Http\Controllers\SearchController@show');

//updates
Route::get('updates', 'App\Http\Controllers\UpdatesController@index');

//archief
Route::get('archive', 'App\Http\Controllers\ArchiveController@index');
Route::get('archive/{archive}', 'App\Http\Controllers\ArchiveController@show');
Route::get('archive/{archive}/edit', 'App\Http\Controllers\ArchiveController@edit');
Route::patch('archive/{archive}', 'App\Http\Controllers\ArchiveController@update');
Route::post('archive/create','App\Http\Controllers\ArchiveController@create');
Route::post('archive','App\Http\Controllers\ArchiveController@store');
Route::delete('archive/{archive}', 'App\Http\Controllers\ArchiveController@destroy');

//regios
Route::get('regions', 'App\Http\Controllers\RegionController@index');
Route::get('regions/{regions}', 'App\Http\Controllers\RegionController@show');
Route::get('regions/{regions}/edit', 'App\Http\Controllers\RegionController@edit');
Route::patch('regions/{regions}', 'App\Http\Controllers\RegionController@update');
Route::post('regions/create','App\Http\Controllers\RegionController@create');
Route::post('regions','App\Http\Controllers\RegionController@store');
Route::delete('regions/{regions}', 'App\Http\Controllers\RegionController@destroy');

//objecten
Route::get('objecten', 'App\Http\Controllers\TruckController@index');
Route::get('objecten/{objecten}', 'App\Http\Controllers\TruckController@show');
Route::get('objecten/{objecten}/edit', 'App\Http\Controllers\TruckController@edit');
Route::patch('objecten/{objecten}', 'App\Http\Controllers\TruckController@update');
Route::post('objecten/create','App\Http\Controllers\TruckController@create');
Route::post('objecten','App\Http\Controllers\TruckController@store');
Route::delete('objecten/{objecten}', 'App\Http\Controllers\TruckController@destroy');


