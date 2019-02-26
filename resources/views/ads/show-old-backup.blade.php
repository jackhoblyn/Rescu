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
				<div class="mb-6">
					<h2 class="text-lg text-grey font-normal mb-3">Notes</h2>
					<!-- {{-- Notes --}} -->
					<textarea class="card w-full" style="min-height: 200px"></textarea>
				</div>
			</div>
			<div class="lg:w-1/4 px-3">
				
				@include('ads.card')

			</div>

		</div>

	</main>
	
	
@endsection