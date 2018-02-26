@extends('layouts.app')
@section('content')

<div class="container">
<div class="row mt-5">
<div class="col-12">

<form method="POST" action="/storeMovie/{{$movies->id}}" enctype="multipart/form-data">
	{{ csrf_field() }}
	<input class="form-control mt-3" type="text" name="name" id="name" placeholder="Name" value="{{ $movies->name }}">

	<select class="form-control mt-3" name="actor_id[]" id="actor_id" multiple="multiple">
	@foreach ($actors as $actor)
	


		@if ($movies->actors->contains($actor)) <option value="{{ $actor->id }}" selected="seleted">{{ $actor->name }}</option>
		@else <option value="{{ $actor->id }}">{{ $actor->name }}</option>
		@endif



	@endforeach
	</select> 

	 <select class="form-control mt-3" name="category_id" id="category_id">
	 @foreach ($cats as $cat)
	  <option value="{{ $cat->id }}" @php if ($movies->category_id == $cat->id) { echo 'selected="seleted"'; } @endphp>{{ $cat->name }}</option>
	 @endforeach
	</select> 
	<input class="form-control mt-3" type="text" name="year" id="year" placeholder="Year" value="{{ $movies->year }}">
	<textarea class="form-control mt-3" name="description" id="description">{{ $movies->description }}</textarea>
	<input class="form-control mt-3" type="text" name="rating" id="rating" placeholder="Rating" value="{{ $movies->rating }}">
	<h3 class="mt-3">Featured photo</h3>
	@if (!empty($movies->images[0]))
	<img src="{{ URL::asset('storage/photo/'.$movies->images[0]->filename) }}" height="50px">
	@endif
	<input multiple="multiple" class="form-control mt-3" type="file" name="photo" id="photo">
	<input class="form-control btn-success mt-3" type="submit" name="submit" value="Submit">
</form>


</div>
</div>
</div>

@endsection