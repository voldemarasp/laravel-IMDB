@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col mt-5">
			<h2>Category list</h2>
		</div>
	</div>
	<div class="row">
		<div class="col mt-5">
@foreach ($movies as $movie)

<h3>{{ $cat->name }}</h3>
<p>{{ $cat->description }}</p>
<p>{{ $cat->actors }}</p>

@endforeach
</div>
</div>
</div>

@endsection