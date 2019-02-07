@extends('layouts.app')

@section('content')
	

	<form method="POST" action="/ads">
		@csrf

		<h1 class="heading is-l">Create an ad</h1>

		<div class="field">
			<label class="label" for="title">Title</label>
			<div class="control">
				<input type="text" class="input" name="title" placeholder="title">
			</div>
		</div>

		<div class="field">
			<label class="label" for="description">Description</label>

			<div class="control">
				<textarea name="description" class="textarea"></textarea>
			</div>

		</div>

		<div class="field">
			<label class="label" for="title">Phone</label>
			<div class="control">
				<input type="text" class="input" name="phone" placeholder="phone type">
			</div>
		</div>

		<div class="field">
			<label class="label" for="title">Price</label>
			<div class="control">
				<input type="number" class="input" name="price" placeholder="price">
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