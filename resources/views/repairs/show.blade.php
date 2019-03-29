@extends('layouts.app')

@section('content')
	<header class="flex items-center mb-4 py-4">
		<div class="flex justify-between items-end w-full">
			<p class="text-grey text-sm font-normal">
				<a href="/repairs" class="text-grey text-sm font-normal no-underline">My Repairs</a> / {{ $repair ->title }}
			</p>
			
		</div>
	</header>

	<main>
		<div class="lg:flex -mx-3">
			<div class ="lg:w-1/2 px-3 mb-6">

				<div class="card" style="height: 100%; position: relative; ">
					<div>
						<h3 class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-blue-light pl-4" style = "float: left">
							<div class="text-black no-underline" >{{ $repair->title }}</div>
						</h3>

						<h1 style= "color: green; text-align: right; font-size: 3rem;"> €{{ $repair->price }} </h1></br>

						<div class="text-blue pt-6 pb-6">
							<h2 class = "pt-1" style = "font-size: 1.2rem;">{{ ($repair->vendor->name) }}</h2>
						</div>
						

						<div class="text-grey">{{ str_limit($repair->description, 150) }}</div>
						
						<div class="flex w-full pt-3" style="align-items: center; justify-content: center;">
							<img class = "center pt-6 mt-6" sizes="100vw" src="/uploads/photos/{{ $repair->pic }}" alt="Card image" style="position: relative; object-fit: cover; object-position: center; min-height: 270px; max-width: 270px; border-radius:50%; float: right;">
							<div class="progress-circle" data-progress="{{ $repair->progress }}" style="float: right; font-size: 3rem;"></div>
						</div>
						<div class = "center mt-8 pt-6">
							<a href="{{ $repair->full() }}" style="text-decoration: none">
								<div class="flex w-full pt-3" style="align-items: center; justify-content: center;">
									<button type="submit" class="button center" style="min-width: 8rem; font-size: 0.9rem; ">View details</button>
								</div>
							</a>
						</div>
					</div>
				</div>

				
			</div>
			<div class="lg:w-1/2 px-3">
				<h1 class=" p-5 mb-5" style="font-family: 'Nunito'; font-size: 2.6rem;">Updates</h1>
				<div class="mb-8">
					@forelse ($repair->updates as $update)
						<div class="card mb-5" style="height:70%; position: relative;"> 
							<div class="flex w-full">
								<p class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-green pl-4">
								<div class="pt-2 w-full">{{ $update->description }} </div></p>
								<div class="progress-circle" style="font-size: 1rem !important; margin: 0; height: 5rem; width: 5rem;" data-progress="{{ $update->progress }}" style="float: right"></div>
							</div>
							<div class="text-green">
							<h2 style = "font-size: 1.2rem;">{{ ($repair->vendor->name) }}</h2>
						</div>
						</div>
					@empty
						<div class="card mb-3"> Nothing yet! </div>
					@endforelse
				</div>

						
	</main>
	
	
@endsection
