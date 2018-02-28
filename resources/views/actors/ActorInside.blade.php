@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
	

<div class="col-4 mt-5 movies-inside-border no-gutters">
@if (isset($actors->images[0]->filename))
<img src="{{ URL::asset('storage/photo/'.$actors->images[0]->filename) }}" width='100%';>
@else
<img src="{{ URL::asset('storage/photo/empty.jpg') }}" width='100%';>
@endif
<div class="pl-3 pt-3 pr-3">
<h3 class="mt-3">{{ $actors->name }}</h3> 
@auth
<hr>
	<p>
		<a href="/editActor/{{ $actors->id }}">Edit</a>
		<a href="/deleteActor/{{ $actors->id }}">Delete</a>
	</p>
@endauth
<hr>
	<p>Birthday: {{ $actors->bithday }}</p>
<hr>
	<p>Deathday: {{ $actors->deathday }}</p>
<hr>
	<p>Movies:
	@foreach ($actors->movies as $movie)
	<a href="{{ URL::asset('movies/'.$movie->id) }}"> {{ $movie->name }}</a>, 
	@endforeach
	</p>
</div>
</div>


<div class="col-8 mt-5 text-center">
		<h3>Images:</h3>
<div class="row ml-3">

@foreach ($actors->images as $image)

<div class="col-4 movie-image-inside mt-3">
<img class="shadow-images" src="{{ URL::asset('storage/photo/'.$image->filename) }}" height='200px' width='100%;'>
</div>

@endforeach
</div>
</div>

</div>
</div>

@endsection