@extends('layouts.app')

@section('content')
<div class = "flex items center" style="padding-left: 8rem; padding-right: 8rem;">
	<form method="POST" class="mx-auto bg-white shadow-lger rounded px-8 pt-6 pb-8 mb-4 ml-9" action="{{$ad->edit()}}" style="min-width: 80%">
		@csrf
		@method('PATCH')
		<div class="mb-4">
			<h1 class="text-center text-red mb-6 pb-6 mt-5 pt-5" style="font-size: 3rem">Edit Your Ad</h1>

			<label class="block text-blue text-sm font-bold mb-2 block" for="title" style="font-size: 1.2rem">Title</label>
			<div class="mb-4-6">
				<input type="text" class="mb-6 shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="title" placeholder="title" value="{{$ad->title}}" style="font-size: 1.2rem">
			</div>
		
			<label class="block text-blue text-sm font-bold mb-2 mt-4" for="description" style="font-size: 1.2rem">Description</label>
			<div class="mb-4-6">
				<textarea name="description" class="mb-6 shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" style="min-height: 200px;" placeholder="Please give an in-depth description of exactly what is wrong with your device" >{{$ad->description}}</textarea>
			</div>

		
			<label class="block text-blue text-sm font-bold mb-2 mt-3" for="phone" style="font-size: 1.2rem">Phone</label>
			<div class="mb-4-6">
				<input type="text" class="mb-6 shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="phone" placeholder="phone type" value="{{$ad->phone}}">
			</div>

			<label class="block text-blue text-sm font-bold mb-2 mt-3" for="price" style="font-size: 1.2rem">Price</label>
			<div class="mb-4-6">
				<input type="number" class="mb-6 shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="price" placeholder="price" value="{{ $ad->price }}">
			</div>

			<div class="mb-4-6">
				<button type="submit" class="mt-6 button is-link mr-2" style="float: left;">Update</button>
				
				<a href="{{ $ad->path() }}">
					<button type="submit" class="mt-6 button is-link mr-2" style="background-color: #fc6821;">Cancel </button>
				</a>
			
			</div>
		</div>
	</form>

@endsection