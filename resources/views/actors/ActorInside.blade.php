@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col mt-5">
			<h2>Personal page</h2>
		</div>
	</div>
	<div class="row">
		
@foreach ($actors as $actor)
<div class="col-3">
	@foreach ($actor->images as $image)
<img src="{{ URL::asset('storage/photo/'.$image->filename) }}" height='200px;'>
  	@endforeach
	<h3>{{ $actor->name }}</h3>
	<p>
		<a href="/editActor/{{ $actor->id }}">Edit</a>
		<a href="/deleteActor/{{ $actor->id }}">Delete</a>
	</p>
	<p>Birthday: {{ $actor->bithday }}</p>
	<p>Deathday: {{ $actor->deathday }}</p>
	<p>Movies:
	@foreach ($actor->movies as $movie)
	<a href="{{ URL::asset('movies/'.$movie->id) }}"> {{ $movie->name }}</a>, 
	@endforeach
	</p>
</div>
@endforeach

</div>
</div>

@endsection