@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		

<div class="col-4 mt-5 movies-inside-border no-gutters">


<img src="http://image.tmdb.org/t/p/w300/{{ $json['poster_path'] }}" width='100%'>

<div class="pl-3 pt-3 pr-3">
<h3 class="mt-3">{{ $json['title'] }}</h3> 

<hr>
<p class="text-justify">{{ $json['overview'] }}</p>
<hr>
<p>Sukurta: <strong>{{ $json['release_date'] }}</strong></p>
<hr>
</div>
</div>

<div class="col-8 mt-5 text-center">
		<h3>Images:</h3>
<div class="row ml-3">
@foreach ($jsonImages as $image)

<div class="col-4 movie-image-inside mt-3">
<img class="shadow-images" src="http://image.tmdb.org/t/p/w300/{{ $image['file_path'] }}" height='200px' width='100%;'>
</div>

@endforeach
</div>
</div>
</div>
</div>
@endsection