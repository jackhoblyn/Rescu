@extends('layouts.vendor')

@section('content')
	<header class="flex items-center mb-4 py-4">
		<div class="flex justify-between items-end w-full">
			<h2 class="text-grey text-sm font-normal">Your Ads</h2>
			<a href="/ads/create" class="button">Create New Ad</a>
		</div>
	</header>

	<main class="lg:flex lg:flex-wrap -mx-3"> 
		<!-- moves everything from left to right -->

		@forelse ($repairs as $repair)
			<div class="lg:w-1/3 px-3 mb-5">
				<div class="card" style="height: 100%; position: relative; ">
					<div>
						<h3 class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-orange-light pl-4" style = "float: left; margin-bottom: -15px;">
							<a href="{{ $repair->list() }}" class="text-black no-underline">
								<div class="text-black no-underline" >{{ ($repair->phone ) }}</div>
							</a>
						</h3>
						<h1 style= "color: green; text-align: right; font-size: 2rem; padding-top: 2%"> €{{ $repair->price }} </h1>
						<div class="text-grey pt-4">{{ str_limit($repair->description, 60) }}</div>
						<img class = "center pt-6 mt-6 ml-6" sizes="70vw" src="/uploads/photos/{{ $repair->pic }}" alt="Card image" style="position: relative; object-fit: cover; object-position: center; min-height: 250px; max-width: 250px; margin-left: 3rem;">
					</div>
				</div>
			</div>

		@empty
			<div style="margin-top: 15%; margin-left: 15%; padding-top: 7%; font-family: 'Nunito';"><h1>No Repairs yet!</h1></div>
		@endforelse
	</main>

	
	
@endsection
