@include('partials/header')

<div class="container">
<div class="row mt-5">
<div class="col-12">


<form method="POST" action="/submitCategorie">
	{{ csrf_field() }}
	<input class="form-control mt-3" type="text" name="name" id="name" placeholder="Name">
	<textarea class="form-control mt-3" name="description" id="description">Description</textarea>
	<input class="form-control btn-success mt-3" type="submit" name="submit" value="Submit">
</form>


</div>
</div>
</div>

@include('partials/footer')