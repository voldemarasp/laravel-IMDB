@extends('layouts.app')
@section('content')

<div class="container">
<div class="row mt-5">
<div class="col-12">


<form method="POST" action="/storeActor/{{$actors->id}}" enctype="multipart/form-data">
	{{ csrf_field() }}
	<input class="form-control mt-3" type="text" name="name" id="name" placeholder="Name" value="{{ $actors->name }}">

	 <select class="form-control mt-3" name="movie_id[]" id="movie_id" multiple="multiple">
	 	@foreach ($movies as $movie)
	  <option value="{{ $movie->id }}">{{ $movie->name }}</option>
	  @endforeach
	</select> 

	<input class="form-control mt-3" type="date" name="birthday" id="birthday" placeholder="Birth year" value="{{ $actors->bithday }}">
	<input class="form-control mt-3" type="date" name="deathday" id="deathday" placeholder="Death year" value="{{ $actors->deathday }}">
	
	<h3>Featured Image</h3>
	@foreach ($actors->images as $image)
	<img src="{{ URL::asset('storage/photo/'.$image->filename) }}" height="60px">
	@endforeach
	<input multiple="multiple" class="form-control mt-3" type="file" name="photo[]" id="photo">

	<input class="form-control btn-success mt-3" type="submit" name="submit" value="Submit">
</form>


</div>
</div>
</div>

@endsection