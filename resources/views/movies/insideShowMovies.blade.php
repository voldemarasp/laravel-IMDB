@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col mt-5">
			<h2>Movie list</h2>
		</div>
	</div>
	<div class="row">
		
@foreach ($movies as $movie)
<div class="col-4 mt-5">
@foreach ($movie->images as $image)
<img src="{{ URL::asset('storage/photo/'.$image->filename) }}" height='200px'>
@endforeach
<h3>{{ $movie->name }}</h3>
<p class="text-justify">{{ $movie->description }}</p>
<p>Kategorija: <strong>{{ $movie->category->name}}</strong></p>
<p>Sukurta: <storng>{{ $movie->date }}</storng></p>
<p>Actors:
@foreach ($movie->actors as $actors)
<a href="{{ URL::asset('actors/'.$actors->id) }}"> {{ $actors->name }}</a> ,
@endforeach
</p>

</div>
@endforeach

</div>
</div>

@endsection