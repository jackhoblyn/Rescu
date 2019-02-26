@extends('layouts.vendor')

@section('content')
	

	<form method="POST" action="/responses">
		@csrf

		<h1 class="heading is-l">Create a Response</h1>

		<div class="field">
			<label class="label" for="title">Description</label>
			<div class="control">
				<input type="text" class="input" name="Description" placeholder="title">
			</div>
		</div>

		<div class="field">
			<label class="label" for="title">Offer</label>
			<div class="control">
				<input type="number" class="input" name="offer" placeholder="price">
			</div>
		</div>

		

		<div class="field">
			<div class="control">
				<button type="submit" class="btn btn-primary">Create Ad</button>
				<a href="/ads">Back</a>
			</div>
		</div>


	</form>

@endsection