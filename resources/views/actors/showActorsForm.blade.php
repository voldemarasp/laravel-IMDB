@extends('layouts.app')
@section('content')

<div class="container">
<div class="row mt-5">
<div class="col-12">


<form method="POST" action="/addActor" enctype="multipart/form-data">
	{{ csrf_field() }}
	<input class="form-control mt-3" type="text" name="name" id="name" placeholder="Name">

	 <select class="form-control mt-3" name="movie_id[]" id="movie_id" multiple="multiple">
	 	@foreach ($movies as $movie)
	  <option value="{{ $movie->id }}">{{ $movie->name }}</option>
	  @endforeach
	</select> 

	<input class="form-control mt-3" type="date" name="birthday" id="birthday" placeholder="Birth year">
	<input class="form-control mt-3" type="date" name="deathday" id="deathday" placeholder="Death year">

	<input multiple="multiple" class="form-control mt-3" type="file" name="photo" id="photo">

	<input class="form-control btn-success mt-3" type="submit" name="submit" value="Submit">
</form>


</div>
</div>
</div>

@endsection