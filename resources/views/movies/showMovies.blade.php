@extends('layouts.app')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col title-bar">
			<h2>Movie list</h2>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-9">
			<div class="row">
@foreach ($movies as $movie)
<div class="col-4 mt-5 shadow mx-3 no-gutters">
	<div class="movie-image">
@foreach ($movie->images as $featImage)

@if ($featImage->featured_image == 'yes')
<img src="{{ URL::asset('storage/photo/'.$featImage->filename) }}" width='100%';>
@php $hasFeaturedImage = 'yes'; @endphp
@endif
@endforeach
@if (!empty($hasFeaturedImage))
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
<div class="col-3 mt-5 sidebar-borderis">
<h3>Latest actors</h3>
<ul>
@foreach ($actors as $actor)
<li><a href="{{ url('/actors') }}/{{ $actor->id }}">{{ $actor->name }}</a></li>
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
{{$movies->links()}}
	</div>
</div>
</div>

@endsection