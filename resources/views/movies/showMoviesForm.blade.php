@extends('layouts.app')
@section('content')

<div class="container">
<div class="row mt-5">
<div class="col-12">


<form method="POST" action="/addMovie" enctype="multipart/form-data">
	{{ csrf_field() }}
	<input class="form-control mt-3" type="text" name="name" id="name" placeholder="Name">

	<select class="form-control mt-3" name="actor_id[]" id="actor_id" multiple="multiple">
	@foreach ($actors as $actor)
	<option value="{{ $actor->id }}">{{ $actor->name }}</option>
	@endforeach
	</select> 

	 <select class="form-control mt-3" name="category_id" id="category_id">
	 @foreach ($cats as $cat)
	  <option value="{{ $cat->id }}">{{ $cat->name }}</option>
	 @endforeach
	</select> 
	<input class="form-control mt-3" type="text" name="year" id="year" placeholder="Year">
	<textarea class="form-control mt-3" name="description" id="description">Description</textarea>
	<input class="form-control mt-3" type="text" name="rating" id="rating" placeholder="Rating">
	<input multiple="multiple" class="form-control mt-3" type="file" name="photo" id="photo">
	<input class="form-control btn-success mt-3" type="submit" name="submit" value="Submit">
</form>


</div>
</div>
</div>

@endsection