@extends('layouts.app')

@section('content')
	<header class="flex items-center mb-4 py-4">
		<div class="flex justify-between mt-2 items-end w-full">
			<p class="text-muted font-light">
                <a href="/home" class="text-muted no-underline hover:underline">Home</a>
                / Finished Repairs
            </p>
		</div>
	</header>

	<main class="lg:flex lg:flex-wrap -mx-3"> 
		<!-- moves everything from left to right -->

		@forelse ($repairs as $repair)
			@if ($repair->complete == 'yes')
				<div class="lg:w-1/2 px-3 mb-5">
					<div class="card" style="height: 100%; position: relative; ">
						<div>
							<h3 class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-green-light pl-4" style = "float: left; margin-bottom: -15px;">
								<a href="{{ $repair->path() }}" class="text-black no-underline">
									<div class="text-black no-underline" >{{ ($repair->phone )}}</div>
								</a>
							</h3>
							<h1 style= "color: green; text-align: right; font-size: 2rem; padding-top: 2%"> €{{ $repair->price }} </h1>
							<div class="text-grey pt-4">{{ str_limit($repair->description, 90) }}</div>
							<div style="text-align: center">
								<img class = "center pt-6 mt-6 ml-6" sizes="70vw" src="/uploads/photos/{{ $repair->pic }}" alt="Card image" style="position: relative; object-fit: cover; object-position: center; min-height: 250px; max-width: 250px; margin-left: 3rem;">
							</div>
						</div>
					</div>
				</div>
			@endif

		@empty
			<div style="margin-top: 15%; margin-left: 15%; padding-top: 7%; font-family: 'Nunito';"><h1>No Repairs yet!</h1></div>
		@endforelse
	</main>

	
	
@endsection



