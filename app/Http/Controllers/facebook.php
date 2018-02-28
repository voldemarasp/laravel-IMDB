<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;
use Session;

class facebook extends Controller
{
    public function redirect() {
    	return Socialite::driver('facebook')->redirect();
    }

    public function callback() {
    	$useris = Socialite::driver('facebook')->user();

    	Session::put('email', $useris->email);
    	Session::put('name', $useris->name);
    	Session::put('fb_id', $useris->id);


    	$user = User::where('fb_id', $useris->id)->first();

		if (empty($user)) {
    		return redirect()->route('register');
		}

		if(Auth::loginUsingId($user->id)){
    		return redirect()->route('displayCategory');
		}
    }
}
