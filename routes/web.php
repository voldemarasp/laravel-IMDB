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
Route::get('/addCategorie', 'CategoriesController@form')->name('addCategory');
Route::post('/submitCategorie', 'CategoriesController@add')->name('submitCategory');
Route::get('/displayCategory', 'CategoriesController@display')->name('displayCategory');

Route::get('/formMovie', 'MoviesController@form')->name('formMovie');
Route::post('/addMovie', 'MoviesController@add')->name('addMovie');
Route::get('/displayMovies', 'MoviesController@display')->name('displayMovies');

Route::get('/formActors', 'ActorController@form')->name('formActors');
Route::post('/addActor', 'ActorController@add')->name('addActor');
Route::get('/displayActors', 'ActorController@display')->name('displayActors');
Route::get('/actor/{id}', 'ActorController@inside')->name('insideActors');