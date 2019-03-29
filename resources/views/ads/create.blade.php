@extends('layouts.app')

@section('content')
<div class = "flex items center" style="padding-left: 8rem; padding-right: 8rem; padding-top: 3%;">
	<form method="POST" class="mx-auto bg-white shadow-lger rounded px-8 pt-6 pb-8 mb-4 ml-9" action="/ads" style="min-width: 80%">
		@csrf
		<div class="mb-4">
			<h1 class="text-center text-red mb-6 pb-6 mt-5 pt-5" style="font-size: 3rem">Create an ad</h1>
			<label class="block text-blue text-sm font-bold mb-2" for="title" style="font-size: 1.2rem">Title</label>

			<div class="mb-4-6">
				<input type="text" class="mb-6 shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="title" placeholder="Title" style="font-size: 1.2rem">
			</div>
		
		<label class="block text-blue text-sm font-bold mb-2 mt-4" for="description" style="font-size: 1.2rem">Description</label>

		<div class="mb-4-6">
			<textarea name="description" class="mb-6 shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" style="min-height: 200px;" placeholder="Please give an in-depth description of exactly what is wrong with your device" ></textarea>
		</div>

		

		<label class="block text-blue text-sm font-bold mb-2 mt-3" for="phone" style="font-size: 1.2rem">Device</label>
		<div class="mb-4-6">
			<input type="text" class="mb-6 shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="phone" placeholder="Please detail the exact deviceyou would like to list">
		</div>

		<label class="block text-blue text-sm font-bold mb-2 mt-3" for="price" style="font-size: 1.2rem">Price</label>
		<div class="mb-4-6">
			<input type="number" class="mb-6 shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="price" placeholder="Price in €">
		</div>

		<div class="mb-4-6">
			
			<button type="submit" class="mt-6 button is-link mr-2" style="float: left;">Create Ad</button>
			
			<a href="/ads">
				<button type="submit" class="mt-6 button is-link mr-2" style="background-color: #fc6821;">Cancel </button>
			</a>
		
		</div>


	
	</div>
	</form>

@endsection