@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		
@foreach ($movies as $movie)
<div class="col-4 mt-5 movies-inside-border no-gutters">

@if (isset($movie->images[0]->filename))
<img src="{{ URL::asset('storage/photo/movies/'.$movie->images[0]->filename) }}" width='100%';>
@else
<img src="{{ URL::asset('storage/photo/empty.jpg') }}" width='100%';>
@endif
<div class="pl-3 pt-3 pr-3">
<h3 class="mt-3">{{ $movie->name }}</h3> 
@auth
<hr>
<p>
<a href="/editMovie/{{ $movie->id }}">Edit</a>
<a href="/deleteMovie/{{ $movie->id }}">Delete</a>
@endauth
</p>
<hr>
<p class="text-justify">{{ $movie->description }}</p>
<hr>
<p>Kategorija: <strong>{{ $movie->category->name}}</strong></p>
<hr>
<p>Sukurta: <strong>{{ $movie->date }}</strong></p>
<hr>
<p>Actors:
@foreach ($movie->actors as $actors)
<a href="{{ URL::asset('actors/'.$actors->id) }}"> {{ $actors->name }}</a> ,
@endforeach
</p>
</div>
</div>
@endforeach

<div class="col-8 mt-5 text-center">
		<h3>Images:</h3>
<div class="row ml-3">

@foreach ($movie->images as $image)

<div class="col-4 movie-image-inside mt-3">
<img class="shadow-images" src="{{ URL::asset('storage/photo/movies/'.$image->filename) }}" height='200px' width='100%;'>
</div>

@endforeach
</div>
</div>

</div>
</div>

@endsection