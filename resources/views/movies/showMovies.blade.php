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
<div class="col-4 mt-5 shadow mx-3 no-gutters">

<div class="movie-image">
@if (isset($movie->images[0]->filename))
<img src="{{ URL::asset('storage/photo/'.$movie->images[0]->filename) }}" width='100%';>
@else
<img src="{{ URL::asset('storage/photo/empty.jpg') }}" width='100%';>
@endif
</div>

<div class="pl-3 pt-3 pr-3">
<h3><a href="{{ url('/movies') }}/{{$movie->id}} "> {{ $movie->name }}</a></h3>
<p class="text-justify">{{ str_limit($movie->description, 100) }}</p>
<p>Kategorija: <strong>{{ $movie->category->name}}</strong></p>
<p>Sukurta: <storng>{{ $movie->date }}</storng></p>
</div>
</div>
@endforeach

</div>
</div>

@endsection