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
<div class="col-3">
	@foreach ($actor->images as $image)
<img src="{{ URL::asset('storage/photo/'.$image->filename) }}" height='200px;'>
  	@endforeach
	<h3><a href="/actor/{{ $actor->id }}">{{ $actor->name }}</a></h3>
	<p>Birthday: {{ $actor->bithday }}</p>
	<p>Deathday: {{ $actor->deathday }}</p>
</div>
@endforeach

</div>
</div>

@endsection