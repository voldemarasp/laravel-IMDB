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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/displayCategory', 'CategoriesController@display')->name('displayCategory');
Route::get('/cats/{id}', 'CategoriesController@displayCat')->name('displayCat');


Route::get('/displayMovies', 'MoviesController@display')->name('displayMovies');
Route::get('/movies/{id}', 'MoviesController@inside')->name('insideMovies');




Route::get('/displayActors', 'ActorController@display')->name('displayActors');
Route::get('/actors/{id}', 'ActorController@inside')->name('insideActors');


Route::middleware('auth')->group(function (){
Route::get('/addCategorie', 'CategoriesController@form')->name('addCategory');
Route::post('/submitCategorie', 'CategoriesController@add')->name('submitCategory');

Route::get('/editMovie/{id}', 'MoviesController@edit')->name('editMovie');
Route::get('/deleteMovie/{id}', 'MoviesController@delete')->name('deleteMovie');
Route::post('/storeMovie/{id}', 'MoviesController@store')->name('storeMovie');
Route::post('/addMovie', 'MoviesController@add')->name('addMovie');
Route::get('/formMovie', 'MoviesController@form')->name('formMovie');

Route::get('/editActor/{id}', 'ActorController@edit')->name('editActors');
Route::post('/storeActor/{id}', 'ActorController@store')->name('storeActor');
Route::get('/deleteActor/{id}', 'ActorController@delete')->name('deleteActors');
Route::post('/addActor', 'ActorController@add')->name('addActor');
Route::get('/formActors', 'ActorController@form')->name('formActors');
});