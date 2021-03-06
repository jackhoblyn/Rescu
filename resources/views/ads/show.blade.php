@extends('layouts.app')

@section('content')
	<header class="flex items-center mb-4 py-4">
		<div class="flex justify-between mt-2 items-end w-full">
			<p class="text-muted font-light">
                <a href="/home" class="text-muted no-underline hover:underline">Home</a> /
                <a href="/ads" class="text-muted no-underline hover:underline"> Your ads </a> / 
                <a href="/ads/{{ $ad->id }}" class="text-muted no-underline hover:underline"> {{ $ad ->title }} </a>
            </p>
		</div>
	</header>

	<main>
		<div class="lg:flex -mx-3">
			<div class ="lg:w-3/4 px-3 mb-6">
				<div class="mb-8">
					<h2 class="text-lg text-grey font-normal mb-3">Responses</h2>
			
					@forelse ($ad->responses as $response)
						<div class="card mb-5" style="height:70%; position: relative;"> 
							<!-- <form class = "h-6" method="POST" action="{{ $ad->list(). '/responses/' . $response->id }}">
								@method('PATCH')
								@csrf -->
							<form action="{{ $ad->path(). '/choose/'. $response->id }}" method="POST">
								
								@csrf              
								<div class="flex w-full">
									@if($response->vendor->type=='shop')
									<p class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-green pl-4">
									@else
									<p class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-orange pl-4">
									@endif
									<div class="pt-2 w-full {{ $response->chosen ? 'text-blue' : '' }}">{{ $response->description }} </div></p>
									<!-- <input name="chosen" type="checkbox" onChange="this.form.submit()" {{ $response->chosen ? 'checked' : '' }}> -->
									<h1 style= "color: green; font-size: 1.2rem;"> €{{ $response->offer }} </h1>
								</div>
								<div class="flex w-full">
									<a href="/view/{{ $response->vendor->id }} "><h1 style= "color: blue; font-size: 1.2rem;"> {{ $response->vendor->name }} </h1></a>

								</div>
								<div class="flex w-full mt-3">
									@if($response->vendor->type=='shop')
										<h1 style= "color: green; font-size: 1.2rem;"> {{ $response->vendor->type }} </h1>
									@else
										<h1 style= "color: orange; font-size: 1.2rem;"> {{ $response->vendor->type }} </h1>
									@endif
								</div>
								<div class="flex w-full mt-3">
									
                            		@foreach(range(1,5) as $i)
	                                	<span class="fa-stack" style="width:1em">
		                                	<i class="far fa-star fa-stack-1x"></i>

		                                	@if($response->vendor->rating >0)
			                                    @if($response->vendor->rating >0.5)
			                                        <i class="fas fa-star fa-stack-1x"></i>
			                                    @else
			                                        <i class="fas fa-star-half fa-stack-1x"></i>
		                                    	@endif
		                                	@endif
		                                	@php $response->vendor->rating--; @endphp
	                                	</span>
                            		@endforeach

                            		({{ $response->vendor->reviews->count() }})
                        		</div>
								
								<div class="flex w-full pt-6">
									<button type="submit" class="button" style="background-color: red">Choose Response</button>
									</form>
									

								
									<a href="{{ $response->vendor->path() }}"><button class="button mx-3" style="background-color: orange">View Profile</button></a>
									<a href="{{ $response->vendor->message() }}"><button class="button">Message</button></a>
								</div>
							
						</div>
					@empty
						<div class="card mb-3"> Nothing yet! </div>
					@endforelse
				
					@if($vendors->count() > 0)
						<div style="margin-top: 3rem; margin-bottom: 2rem;">
		                    <div style="border-bottom: 4px solid black !important; width: 8rem !important;">
		                        
		                    </div>
		                </div>

                		<h2 class="text-lg text-grey font-normal mb-3">Suggestions in your area</h2>
            		@endif

                
	                @forelse ($vendors as $vendor)
						<div class="card mb-5" style="height:70%; position: relative;">
								<p class="font-normal text-m py-4 -ml-5 border-l-4 border-red pl-4"> 
								<b>{{ $vendor->name }} </b></p>
								<p>{{ $vendor->city }}</p>
								<p class="pt-3" style="color: green">{{ $vendor->type }}</p>
								<p class="font-normal pt-3 text-sm" style="color:blue"> 
								<b>Specializes in: {{ $vendor->skill }} </b></p>
								<div class="flex w-full mt-3">
									
                            		@foreach(range(1,5) as $i)
	                                	<span class="fa-stack" style="width:1em">
		                                	<i class="far fa-star fa-stack-1x"></i>

		                                	@if($vendor->rating >0)
			                                    @if($vendor->rating >0.5)
			                                        <i class="fas fa-star fa-stack-1x"></i>
			                                    @else
			                                        <i class="fas fa-star-half fa-stack-1x"></i>
		                                    	@endif
		                                	@endif
		                                	@php $vendor->rating--; @endphp
	                                	</span>
                            		@endforeach

                            		({{ $vendor->reviews->count() }})
                        		</div>
                        		<div class="flex w-full pt-6">
									<a href="{{ $vendor->path() }}"><button class="button">View Profile</button></a>
									<a href="{{ $vendor->message() }}"><button class="button ml-3" style="background-color: orange">Message</button></a>
								</div>
						</div>
								
					@empty
							
					@endforelse
					</div>
				
            	


			</div>
			<div class="lg:w-1/3 px-3">
				<div class="card" style="position: relative; ">
					<div>
						<h3 class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-blue-light pl-4" style = "float: left; max-width: 15rem;">
							<div class="text-black no-underline" ><b>{{ $ad->title }}</b></div>
						</h3>

						<h1 style= "color: green; text-align: right; font-size: 3rem; padding-top: 1rem;"> €{{ $ad->price }} </h1></br>
						

						<div class="text-grey pb-4" style="margin-top: 2rem">{{ str_limit($ad->description, 60) }}</div>
						<a href="{{ $ad->full() }}">
							<div class="textWithBlurredBg flex w-full" style="align-items: center; justify-content: center;">
								<img class = "center mt-6" sizes="100vw" src="/uploads/photos/{{ $ad->photo }}" alt="Card image" style="position: relative; object-fit: cover; object-position: center; min-height: 300px; max-width: 320px;">
								<h2 style="margin-top: 16%">View Details</h2>
							</div>
						</a>
						


						<!-- <form class = "mt-6 pt-6" enctype="multipart/form-data" action="/ads" method="POST">
                                <label style="margin-top: .5rem; font-weight: 550;">Update Profile Picture</label>
                                <input type="file" name="avatar" style="margin-top: .2rem">
                                @csrf
                                <input type="submit" class="button" style="margin-top: .5rem">
                        </form> -->
					</div>
				</div>
			</div>

	</main>
	
	
@endsection



					