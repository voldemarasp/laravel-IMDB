@include('partials/header')
<div class="container">
	<div class="row">
		<div class="col mt-5">
			<h2>Movie list</h2>
		</div>
	</div>
	<div class="row">
		
@foreach ($movies as $movie)
<div class="col-4 mt-5">
<h3>{{ $movie->name }}</h3>
<p>{{ $movie->description }}</p>
<p>{{ $movie->category->name}}</p>
<p>{{ $movie->user->name }}</p>
<p>{{ $movie->year }}</p>
<p>{{ $movie->description }}</p>
<p>{{ $movie->rating }}</p>
<p>{{ $movie->date }}</p>
</div>
@endforeach

</div>
</div>
@include('partials/footer')