@include('partials/header')
<div class="container">
	<div class="row">
		<div class="col mt-5">
			<h2>Category list</h2>
		</div>
	</div>
	<div class="row">
		<div class="col mt-5">
@foreach ($cats as $cat)

<h3>{{ $cat->name }}</h3>
<p>{{ $cat->description }}</p>

@endforeach
</div>
</div>
</div>
@include('partials/footer')