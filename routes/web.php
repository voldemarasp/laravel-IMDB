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

Auth::routes();

Route::get('/', 'HomeController@index')->name('welcome');
Route::get('/addCategorie', 'CategoriesController@form')->name('add');
Route::post('/submitCategorie', 'CategoriesController@add')->name('add');
Route::get('/displayCategorie', 'CategoriesController@display')->name('display');

Route::get('/formMovie', 'MoviesController@form')->name('form');
Route::post('/addMovie', 'MoviesController@add')->name('add');
Route::get('/displayMovies', 'MoviesController@display')->name('display');