@extends('layouts.app')

@section('content')
	<header class="flex items-center mb-4 py-4">
		<div class="flex justify-between items-end w-full">
			<p class="text-grey text-sm font-normal">
				<a href="/ads" class="text-grey text-sm font-normal no-underline">My Ads</a> / {{ $ad ->title }}
			</p>
			
		</div>
	</header>

	<main>
		<div class="lg:flex -mx-3">
			<div class ="lg:w-3/4 px-3 mb-6">
				<div class="mb-8">
					<h2 class="text-lg text-grey font-normal mb-3">Responses</h2>
					<!-- {{-- responses --}} -->
					@forelse ($ad->responses as $response)
						<div class="card mb-5" style="height:70%; position: relative;"> 
							<!-- <form class = "h-6" method="POST" action="{{ $ad->list(). '/responses/' . $response->id }}">
								@method('PATCH')
								@csrf -->
							<form action="{{ $ad->path(). '/choose/'. $response->id }}" method="POST">
								
								@csrf              
								<div class="flex w-full">
									<p class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-red pl-4">
									<div class="pt-2 w-full {{ $response->chosen ? 'text-blue' : '' }}">{{ $response->description }} </div></p>
									<!-- <input name="chosen" type="checkbox" onChange="this.form.submit()" {{ $response->chosen ? 'checked' : '' }}> -->
									<h1 style= "color: green; font-size: 1rem;"> ${{ $response->offer }} </h1>
								</div>
								<div class="flex w-full">
									<h1 style= "color: blue; font-size: 0.8rem;"> {{ $response->vendor->name }} </h1>
								</div>
								<div class="flex w-full">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</div>
								<div class="flex w-full pt-6">
									<button type="submit" class="button2">Choose Response</button>
								</div>
							</form>
						</div>
					@empty
						<div class="card mb-3"> Nothing yet! </div>
					@endforelse
				</div>
			</div>
			<div class="lg:w-1/2 px-3">
				<div class="card" style="height: 100%; position: relative; ">
					<div>
						<h3 class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-blue-light pl-4" style = "float: left">
							<div class="text-black no-underline" >{{ $ad->title }}</div>
						</h3>

						<h1 style= "color: green; text-align: right; font-size: 3rem;"> ${{ $ad->price }} </h1></br>

						<div class="text-grey">{{ str_limit($ad->description, 60) }}</div>

						<img class = "center pt-6 mt-6" sizes="100vw" src="/uploads/photos/{{ $ad->photo }}" alt="Card image" style="position: relative; object-fit: cover; object-position: center; min-height: 300px; max-width: 320px;">

						<div class = "center mt-5" style="width: 5rem;">
							<a href="{{ $ad->full() }}" style="text-decoration: none">
								<div class="flex w-full pt-3">
									<button type="submit" class="button2" style="min-width: 8rem; margin-left: -1.7rem; font-size: 0.9rem; ">View Full Ad</button>
								</div>
							</a>
						</div>


						<!-- <form class = "mt-6 pt-6" enctype="multipart/form-data" action="/ads" method="POST">
                                <label style="margin-top: .5rem; font-weight: 550;">Update Profile Picture</label>
                                <input type="file" name="avatar" style="margin-top: .2rem">
                                @csrf
                                <input type="submit" class="button" style="margin-top: .5rem">
                        </form> -->
					</div>
				</div>
			</div>

			</div>





			</div>

		</div>

	</main>
	
	
@endsection



					