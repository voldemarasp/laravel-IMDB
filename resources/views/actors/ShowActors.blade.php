@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col mt-5">
			<h2>Actors list</h2>
		</div>
	</div>
	<div class="row">
		
@foreach ($actors as $actor)
<div class="col-4 mt-5 shadow mx-3 no-gutters">
	@foreach ($actor->images as $image)
	@php dd($image); @endphp
	<div class="movie-image">
@if (isset($image[0]->filename))
<img src="{{ URL::asset('storage/photo/'.$image[0]->filename) }}" width='100%';>
@else
<img src="{{ URL::asset('storage/photo/empty.jpg') }}" width='100%';>
@endif
</div>
  	@endforeach
  	<div class="pl-3 pt-3 pr-3">
	<h3><a href="/actors/{{ $actor->id }}">{{ $actor->name }}</a></h3>
	<p>Birthday: {{ $actor->bithday }}</p>
	<p>Deathday: {{ $actor->deathday }}</p>
</div>
</div>
@endforeach

</div>
</div>

@endsection