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

		<div class="card mx-auto" style="max-height: 90%; min-height: 800px; position: relative; margin-bottom: 50px;">
			<div>

				<h3 class="font-normal text-xl mb-3 py-3 -ml-5 border-l-4 border-blue-light pl-7" style = "font-size: 2em; float: left">
					<div class="text-black no-underline pt-3 ml-8" >{{ $ad->title }}</div>
				</h3>

				<h1 class = "mt-3 pt-5 pr-6 mr-6" style= "color: green; text-align: right; font-size: 5rem;"> ${{ $ad->price }} </h1></br>
			</div>
			<div class="text-grey pt-6 pl-6">
				<h2 class = "pt-1" style = "font-size: 1.2rem;">{{ ($ad->phone) }}</h2>
			</div>
			<div class="text-blue pt-6 pl-6">
				<h2 class = "pt-1" style = "font-size: 1.2rem;">{{ ($ad->user->name) }}</h2>
			</div>

			<div class="text-black pt-9 pl-6" style="width: 50%; float: left; min-width: 50%; padding-top: 4rem;">
				<h2 style = "font-size: 0.9rem;">{{ ($ad->description) }}</h2>
			</div>

			<div class="mt-8 pt-7">
				<img class = "center mt-6" src="/uploads/photos/{{ $ad->photo }}" alt="Card image" style="width:100% max-height: 350px; max-width: 350px; padding-top: 1%; margin-left:10rem">
					<div style="float: right">
						<form enctype="multipart/form-data" action="{{$ad->full()}}" method="POST">
							<div class="field mt-3" style=" margin-right: 2.5rem;">
		                    	<label style="margin-top: .5rem; font-weight: 550;">Update Photo</label>
	                    	</div>
	                    	<div class="field mt-3" style=" margin-right: 2.5rem;">
		                    	<input type="file" name="photo" style="margin-top: .2rem">
		                    	@csrf
	                    	</div>
	                    	<div class="field mt-3" style=" margin-right: 15rem;">
		                    	<input type="submit" class="button center" style="margin-top: .5rem; background-color: #6d34dc; margin-left: 0.6rem;" >
	                    	</div>
		                </form>
	                </div>
			</div>

			<div class = "mt-8 pt-8 pl-8 ml-6" style="width: 5rem; position: relative">
				<a href="{{ $ad->edit() }}" class="mt-6 pt-6" style="text-decoration: none">
					<div class="flex w-full pt-3">
						<button type="submit" class="button" style="min-width: 8rem; margin-left: -1.7rem; font-size: 0.9rem; ">Edit</button>
					</div>
				</a>
			</div>
		</div>
	</main>
	
@endsection




	