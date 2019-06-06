@extends('layouts.vendor')

@section('content')
	<header class="flex items-center mb-4 py-4">
		<div class="flex justify-between items-end w-full">
			<p class="text-grey text-sm font-normal">
				<a href="/vendor/ads" class="text-grey text-sm font-normal no-underline">Local Ads</a> / {{ $ad ->title }}
			</p>
			
		</div>
	</header>

	<main>

		<div class="card" style="height: 50%; position: relative; ">
			<div>

				<h3 class="font-normal text-xl mb-3 py-3 -ml-5 border-l-4 border-blue-light pl-7" style = "font-size: 2.4em; float: left">
					<div class="text-black no-underline pt-3 ml-8" ><b>{{ $ad->title }}</b></div>
				</h3>

				<h1 class = "mt-3 pt-5 pr-5" style= "color: green; text-align: right; font-size: 5rem;"> €{{ $ad->price }} </h1></br>
			</div>
			<div class="text-grey pt-6 pl-6">
				<h2 class = "pt-1" style = "font-size: 1.7rem;">{{ ($ad->phone) }}</h2>
			</div>
			<div class="text-blue pt-6 pl-6">
				<h2 class = "pt-1" style = "font-size: 1.7rem;">{{ ($ad->user->name) }}</h2>
			</div>

		<div class="text-black pt-9 pl-6 mt-6" style="width: 50%; float: left; margin-top: 4rem">
			<h2 style = "font-size: 1.6rem; padding-top: 9rem">{{ ($ad->description) }}</h2>
		</div>

		<div class="mt-8 pt-7" style="vertical-align: top; display: inline-block;">
				<img class = "mt-6" src="/uploads/photos/{{ $ad->photo }}" alt="Card image" style="max-height: 385px; min-height: 440px; padding-top: 1%; margin-left:32%; border-radius:50%;">
			</div>




			<div class="lg:flex -mx-3">
			<div class ="lg:w-3/4 px-3 mb-6">
				<div class="mb-8">
					<div class="pt-6">
						<h3 class ="mb-6">Leave a response</h3>
						<h4 style= "color: green;"> Asking price €{{ $ad->price }} </h1></br>
							<form action="{{ $ad->list(). '/responses' }}" method="POST">
								@csrf              
								<div class="pt-6 mb-3">

									<label class="block text-blue text-sm font-bold mb-2 mt-4" for="description" style="font-size: 1.2rem">Message for Advertiser</label>

									<div class="mb-4-6">
										<textarea name="description" class="mb-6 shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" style="min-height: 200px;" placeholder="Describe why you think you would be a good choice" ></textarea>
									</div>

									<label class="block text-blue text-sm font-bold mb-2 mt-4" for="description" style="font-size: 1.2rem">Offer in €'s</label>

									<div class="pt-2">
										<input type="number"  class="card w-full pt-6 border rounded text-grey-darker" name="offer" placeholder="Your Offer">
									</div>

									<div class="pt-6">
										<input type="hidden" name="chosen" type="checkbox" onChange="this.form.submit()" >
									</div>

									<div class="pt-2">
										<button type="submit" class="button">Create Response</button>
									</div>
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

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@endsection




	