@extends('layouts.app')

@section('content')
	<header class="flex items-center mb-4 py-4">
		<div class="flex justify-between items-end w-full">
			<h2 class="text-grey text-sm font-normal">Your Ads</h2>
			<a href="/ads/create" class="button">Create New Ad</a>
		</div>
	</header>

	<main class="lg:flex lg:flex-wrap -mx-3"> 
		<!-- moves everything from left to right -->

		@forelse ($ads as $ad)
			<div class="lg:w-1/3 px-3 pb-6">
				@include ('ads.card')
			</div>
		@empty
			<div>No ads yet</div>
		@endforelse
	</main>
	
@endsection

