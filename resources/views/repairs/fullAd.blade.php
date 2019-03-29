@extends('layouts.vendor')

@section('content')
	<header class="flex items-center mb-4 py-4">
		<div class="flex justify-between items-end w-full">
			
		</div>
	</header>

	<main>

		<div class="card mx-auto" style="max-height: 90%; min-height: 800px; position: relative; margin-bottom: 50px;">
			<div>

				<h3 class="font-normal text-xl mb-3 py-3 -ml-5 border-l-4 border-orange-light pl-7" style = "font-size: 2em; float: left">
					<div class="text-black no-underline pt-3 ml-8" >{{ $repair->title }}</div>
				</h3>
				<h1 class = "mt-3 pt-5 pr-6 mr-6" style= "color: green; text-align: right; font-size: 5rem;"> €{{ $repair->price }} </h1></br>
				<h1 class = "pr-6 mr-6" style= "color: black; text-align: right; font-size: 1rem;"> Agreed Price </h1></br>
			</div>

			<div class="text-grey pt-6 pl-6">
				<h2 class = "pt-1" style = "font-size: 1.2rem;">{{ ($repair->phone) }}</h2>
			</div>
			<div class="text-blue pt-6 pl-6">
				<h2 class = "pt-1" style = "font-size: 1.2rem;">{{ $repair->vendor->name }}</h2>
			</div>

			<div class="text-black pt-9 pl-6" style="width: 50%; float: left; min-width: 50%; padding-top: 4rem;">
				<h2 style = "font-size: 0.9rem;">{{ ($repair->description) }}</h2>
			</div>
			
			<div class="mt-3 pt-7">
				<img class = "mt-6" src="/uploads/photos/{{ $repair->pic }}" alt="Card image" style="max-height: 440px; min-height: 440px; padding-top: 1%; margin-left:10%; border-radius:50%;">

				
			</div>
		</div>
	</main>
	
@endsection




	