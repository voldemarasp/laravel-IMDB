@extends('layouts.app')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col title-bar">
			<h2>Actors list</h2>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-9">
			<div class="row">
@foreach ($actors as $actor)
<div class="col-4 mt-5 shadow mx-3 no-gutters">
	<div class="movie-image">

@if (isset($actor->images[0]->filename))
<img src="{{ URL::asset('storage/photo/actors/'.$actor->images[0]->filename) }}" width='100%';>
@else
<img src="{{ URL::asset('storage/photo/empty.jpg') }}" width='100%';>
@endif
</div>

  	<div class="pl-3 pt-3 pr-3">
	<h3><a href="/actors/{{ $actor->id }}">{{ $actor->name }}</a></h3>
	<p>Birthday: {{ $actor->bithday }}</p>
	<p>Deathday: {{ $actor->deathday }}</p>
</div>
</div>
@endforeach
</div>
</div>
<div class="col-3 mt-5 sidebar-borderis">
<h3>Latest movies</h3>
<ul>
@foreach ($movies as $movie)
<li><a href="{{ url('/movies') }}/{{ $movie->id }}">{{ $movie->name }}</a></li>
@endforeach
</ul>
<hr>
<h3>Categories</h3>
<ul>
@foreach ($cats as $cat)
<li><a href="{{ url('/cats') }}/{{ $cat->id }}">{{ $cat->name }} ({{ $cat->movies->count() }})</a></li>
@endforeach
</ul>
<hr>
<h3>Latest images</h3>
<div class="row">
@foreach ($images as $image)
<div class="col-6 sidebar-images mt-3">
<img src="{{ URL::asset('storage/photo/'.$image->filename) }}">
</div>
@endforeach
</div>
</div>
</div>
<div class="row">
	<div class="col mt-5 d-flex justify-content-center">
{{$actors->links()}}
	</div>
</div>
</div>

@endsection