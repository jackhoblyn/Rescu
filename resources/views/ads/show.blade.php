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
						<div class="card mb-3"> 
						<form method="POST" action="{{ $ad->list(). '/responses/' . $response->id }}">
							@method('PATCH')
							@csrf

							<div class="flex w-full">
								<div class="w-full {{ $response->chosen ? 'text-blue' : '' }}">{{ $response->description }} </div>
								<input name="chosen" type="checkbox" onChange="this.form.submit()" {{ $response->chosen ? 'checked' : '' }}>
							</div>
						</form>
						</div>
					@empty
						<div class="card mb-3"> Nothing yet! </div>
					@endforelse
				</div>
			</div>
			<div class="lg:w-1/2 px-3">
				<div class="card" style="height: 110%; position: relative; ">
					<div>
						<h3 class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-blue-light pl-4" style = "float: left">
							<div class="text-black no-underline" >{{ $ad->title }}</div>
						</h3>

						<h1 style= "color: green; text-align: right; font-size: 3rem;"> ${{ $ad->price }} </h1></br>

						<div class="text-grey">{{ str_limit($ad->description, 60) }}</div>

						<img class = "center pt-6 mt-6" src={{ asset('img/nyes.jpg') }} alt="Card image" style="width:100% max-height: 180px; max-width: 180px;">
					</div>
				</div>
			</div>

			</div>





			</div>

		</div>

	</main>
	
	
@endsection