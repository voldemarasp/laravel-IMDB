<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
            
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            
            @if (Route::has('login'))
                <div class="row">
                    <div class="col-6 loginai">
                    @auth
                    <ul>
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li><a href="{{ url('/displayCategorie') }}">Categories</a></li>
                        <li><a href="{{ url('/displayMovies') }}">Movies</a></li>
                    @else
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                    </ul>
                </div>
                <div class="col-6 loginai">
                    @auth
                    <ul>
                        <li><a href="{{ url('/addCategorie') }}">Add Categorie</a></li>
                        <li><a href="{{ url('formMovie') }}">Add Movie</a></li>
                        <li><a href="{{ url('/addActor') }}">Add Actor</a></li>
                    </ul>
                    @endauth 
                </div>

                </div>
            @endif
