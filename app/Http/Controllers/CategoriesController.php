<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Categories;
use Auth;
use App\Movies;

class CategoriesController extends Controller
{
	public function form () {

		return view('categories.addCategorieForm');
	}

    public function add (Request $request) {

    	$name = $request->input('name');
    	$description = $request->input('description');
    	$user_id = Auth::User()->id;

    	$posts = Categories::create(['name' => $name, 'description' => $description, 'user_id' => $user_id]);

    	return redirect()->route('displayCategory');
    }

    public function display () {

    	$cats = Categories::get();

    	return view('categories.showCategories', ['cats' => $cats]);
    }

    public function displayCat ($id) {
    	$movies = Movies::where('category_id', $id)->get();
    	return view('movies.showMovies', ['movies' => $movies]);
    }


    }


