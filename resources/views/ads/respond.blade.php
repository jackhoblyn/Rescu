@extends('layouts.app')

@section('content')
	

	<form method="POST" action="/ads/respond/">
		@csrf

		<h1 class="heading is-l">Create a response!</h1>


		<div class="field">
			<label class="label" for="description">Description</label>
			<div class="control">
				<textarea name="description" class="textarea"></textarea>
			</div>

		</div>

		<div class="field">
			<label class="label" for="title">Offer</label>
			<div class="control">
				<input type="number" class="input" name="offer" placeholder="offer">
			</div>
		</div>

		<div class="field">
			<div class="control">
				<button type="submit" class="btn btn-primary">Create Response</button>
				<a href="/ads">Back</a>
			</div>
		</div>


	</form>

@endsection