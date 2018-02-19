<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Categories;
use Auth;

class CategoriesController extends Controller
{
	public function form () {

		return view('categories.addCategorieForm');
	}

    public function add () {

    	$name = $_POST['name'];
    	$description = $_POST['description'];
    	$user_id = Auth::User()->id;

    	$posts = Categories::insert(['name' => $name, 'description' => $description, 'user_id' => $user_id]);

    	return view('categories.addCategorieForm');
    }

    public function display () {
    	$cats = Categories::get();

    	return view('categories.showCategories', ['cats' => $cats]);
    }
}
