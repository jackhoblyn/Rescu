@extends('layouts.vendor')

@section('content')
	<header class="flex items-center mb-4 py-4">
		<div class="flex justify-between items-end w-full">
			<h2 class="text-grey text-sm font-normal">All Ads</h2>
		</div>
	</header>

	<main class="lg:flex lg:flex-wrap -mx-3"> 
		<!-- moves everything from left to right -->

		@forelse ($ads as $ad)
		<div class="lg:w-1/3 px-3 pb-6">
			<div class="bg-white rounded-lg p-5 shadow" style="height: 200px">
				<h3 class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-blue-light pl-4">
					<a href="{{ $ad->list() }}" class="text-black no-underline" >{{ $ad->title }}</h3></a>
				</h3>

				<div class="text-grey">{{ str_limit($ad->description, 60) }}</div>

			</div>
		</div>
		@empty
			<div>No ads yet</div>
		@endforelse
	</main>
	
@endsection

