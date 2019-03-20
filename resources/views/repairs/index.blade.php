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

		@forelse ($repairs as $repair)



			<div class="lg:w-1/3 px-3 mb-5">
				<div class="card" style="height: 100%; position: relative; ">
					<div>
						<h3 class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-orange-light pl-4" style = "float: left; margin-bottom: -15px;">
							<a href="{{ $repair->path() }}" class="text-black no-underline">
								<div class="text-black no-underline" >{{ ($repair->phone )}}</div>
							</a>
						</h3>
						<h1 style= "color: green; text-align: right; font-size: 2rem; padding-top: 2%"> ${{ $repair->price }} </h1>
					</div>
				</div>
			</div>

		@empty
			<div>No ads yet</div>
		@endforelse
	</main>
	
@endsection

