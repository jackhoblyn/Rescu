@extends('layouts.vendor')

@section('content')
	<header class="flex items-center mb-4 py-4">
		<div class="flex justify-between items-end w-full">
			<p class="text-grey text-sm font-normal">
				<a href="/vendor/ads" class="text-grey text-sm font-normal no-underline">Ads</a> / {{ $ad ->title }}
			</p>
			
		</div>
	</header>

	<main>

		<div class="card" style="height: 100%; position: relative; ">
			<div>
				<h3 class="font-normal text-xl mb-3 py-3 -ml-5 border-l-4 border-blue-light pl-7" style = "font-size: 3em; float: left">
					<div class="text-black no-underline pt-3" >{{ $ad->title }}</div>
				</h3>

				<h1 class = "mt-3 pt-5 pr-5" style= "color: green; text-align: right; font-size: 3.6rem;"> ${{ $ad->price }} </h1></br>
			</div>
			<div class="text-grey pt-6 pl-6">
				<h2 class = "pt-5" style = "font-size: 1.3em;">{{ ($ad->phone) }}</h2>
			</div>

			<div class="text-black pt-9 pl-6">
				<h2 style = "font-size: 0.9em;">{{ ($ad->description) }}</h2>
			</div>

			<div class="mt-6 pt-8" style="position: relative;">
				<img class = "center" src={{ asset('img/nyes.jpg') }} alt="Card image" style="width:100% max-height: 400px; max-width: 400px;">
			</div>


			<div class="lg:flex -mx-3">
			<div class ="lg:w-3/4 px-3 mb-6">
				<div class="mb-8">
					<div class="pt-6">
						<h3 class ="mb-6">Leave a response</h3>
						<h4 style= "color: green;"> Asking price ${{ $ad->price }} </h1></br>
							<form action="{{ $ad->list(). '/responses' }}" method="POST">
								@csrf              
								<div class="pt-6 mb-3">
									<input placeholder ="Message for advertiser" class="card w-full pt-6 border-blue-light rounded text-grey-darker" name="description">
								</div>

								<div class="pt-2">

									<input type="number"  class="card w-full pt-6 border rounded text-grey-darker" name="offer" placeholder="Your Offer">
								</div>

								<div class="pt-6">
									<input type="hidden" name="chosen" type="checkbox" onChange="this.form.submit()" >
								<div class="pt-6">

								<div class="pt-2">
									<button type="submit" class="button">Create Response</button>
								</div>
							</form>

						</div>
					</div>
					<!-- {{-- responses --}} -->
					<!-- @foreach ($ad->responses as $response)
						<div class="card mb-3">
							<form method="POST" action="{{ $ad->list(). '/responses/' . $response->id }}">
								@method('PATCH')
								@csrf

								<div>
									<input name="description" value="{{ $response->description }}" class="w-full {{ $response->chosen ? 'text-blue' : '' }}" > 
									<input name="description" value="{{ $response->description }}" class="w-full {{ $response->chosen ? 'text-blue' : '' }}" > 
									<input type="hidden" name="chosen" type="checkbox" onChange="this.form.submit()" {{ $response->chosen ? 'checked' : '' }} >
									<h1>offer></h1>
								</div>

								<div>
									<input name = "offer" value="{{ $response->offer }}"type="number" class="input" name="offer" placeholder="offer">
									
								</div>

							</form>
						</div>
					@endforeach
					<form action="{{ $ad->list(). '/responses' }}" method="POST">
						@csrf
						<input placeholder ="Respond to Ad?" class="card w-full" name="description">
					</form> -->
				</div>
				
			</div> 

		</div>

		

	</main>
	
@endsection




	