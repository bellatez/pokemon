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

Route::view('/', 'index');
Route::view('/search', 'search');

Route::get('/search-results', 'PokemonController@searchData')->name('search.results');
Route::get('/backup', 'PokemonController@backupData')->name('backup');
Route::get('/delete', 'PokemonController@deleteData')->name('delete');
