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
			@if ($ad->chosen == 'no')
			<!-- <div class="lg:w-1/3 px-3 pb-6">
				@include ('ads.card')
			</div> -->


			<div class="lg:w-1/3 px-3 mb-5">
				<div class="card" style="height: 100%; position: relative; ">
					<div>
						<h3 class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-blue-light pl-4" style = "float: left; margin-bottom: -15px;">
							<a href="{{ $ad->path() }}" class="text-black no-underline">
								<div class="text-black no-underline" >{{ str_limit($ad->title, 26 )}}</div>
							</a>
						</h3>

						<h1 style= "color: green; text-align: right; font-size: 2rem; padding-top: 2%"> €{{ $ad->price }} </h1>

						<div class="text-grey pt-4">{{ str_limit($ad->description, 60) }}</div>

						<img class = "center pt-6 mt-6 ml-6" sizes="70vw" src="/uploads/photos/{{ $ad->photo }}" alt="Card image" style="position: relative; object-fit: cover; object-position: center; min-height: 250px; max-width: 250px; margin-left: 3rem;">

						<!-- <div class = "center mt-5" style="width: 5rem;">
							<a href="{{ $ad->full() }}" style="text-decoration: none">
								<div class="flex w-full pt-3">
									<button type="submit" class="button2" style="min-width: 8rem; margin-left: -1.7rem; font-size: 0.9rem; ">View Full Ad</button>
								</div>
							</a>
						</div> -->


						<!-- <form class = "mt-6 pt-6" enctype="multipart/form-data" action="/ads" method="POST">
                                <label style="margin-top: .5rem; font-weight: 550;">Update Profile Picture</label>
                                <input type="file" name="avatar" style="margin-top: .2rem">
                                @csrf
                                <input type="submit" class="button" style="margin-top: .5rem">
                        </form> -->
					</div>
				</div>
			</div>




			@endif
		@empty
			<div>No ads yet</div>
		@endforelse
	</main>
	
@endsection

