@extends('layouts.app')

@section('content')
	<header class="flex items-center mb-4 py-4">
		<div class="flex justify-between mt-2 items-end w-full">
			<p class="text-muted font-light">
                <a href="/home" class="text-muted no-underline hover:underline">Home</a> /
                @if ($repair->complete == 'no')
                	<a href="/repairs" class="text-muted no-underline hover:underline"> Active Repairs</a> /  {{ $repair->title }}
                @else
                	<a href="/finished" class="text-muted no-underline hover:underline"> Finished Repairs</a> /  {{ $repair->title }}
            	@endif

            </p>
		</div>
	</header>

	<main>
		<div class="lg:flex -mx-3">
			<div class ="lg:w-1/2 px-3 mb-6" style="max-height: 730px">

				<div class="card" style="height: 100%; position: relative; ">
					<div>
						<h3 class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-blue-light pl-4" style = "float: left">
							<div class="text-black no-underline" ><h2 style="font-size: 1.4rem"><b>{{ $repair->title }}</b></h2></div>
						</h3>

						<h1 style= "color: green; text-align: right; font-size: 3rem;"> €{{ $repair->price }} </h1></br>

						<div class="text-blue pt-6 pb-6">
							<h2 class = "pt-1" style = "font-size: 1.2rem;">{{ ($repair->vendor->name) }}</h2>
						</div>
						

						<div class="text-grey">{{ str_limit($repair->description, 150) }}</div>

						@if($repair->progress == 100 and $repair->payment=='no')
							<div class="pt-4 text-red" style="font-size: 1.2rem"><b>Payment Status: Awaiting Payment</b></div>
						@elseif($repair->progress == 100 and $repair->payment=='yes')
							<div class="pt-4 text-green" style="font-size: 1.2rem"><b>Payment Status: Accepted</b></div>
						@endif
						
						<div class="flex w-full pt-3" style="align-items: center; justify-content: center;">
							<img class = "center pt-6 mt-6" sizes="100vw" src="/uploads/photos/{{ $repair->pic }}" alt="Card image" style="position: relative; object-fit: cover; object-position: center; min-height: 270px; max-width: 270px; border-radius:50%; float: right;">
							<div class="progress-circle" data-progress="{{ $repair->progress }}" style="float: right; font-size: 3rem; min-width: 15rem"></div>
						</div>
						<div style="float: right; padding-right: 7rem; padding-top: 1rem">
							<p style="color: green">Repair Progress</p>
						</div>
						<div class = "w-full mt-8 pt-6">
							<a href="{{ $repair->full() }}" style="text-decoration: none">
								<div class="flex w-full pt-6 mt-6" style="align-items: center; justify-content: center;">
									<button type="submit" class="button center" style="min-width: 8rem; font-size: 0.9rem; ">View details</button></a>
						
									@if($repair->progress == 100 && $repair->payment == 'no')
									
									<a href="{{ $repair->path() .'/pay' }}">
										<button type="submit" class="bg-green ml-6 hover:bg-green-dark text-white font-bold py-2 px-4 rounded" style="min-width: 8rem; font-size: 0.9rem; ">Proceed to Payment</button>
									</a>
									
									@endif
						
									@if ($repair->payment == 'yes' && $repair->complete == 'yes')
										
										<a href="{{ $repair->path() .'/review' }}">
											<button type="submit" class="bg-green ml-6 hover:bg-green-dark text-white font-bold py-2 px-4 rounded" style="min-width: 8rem; font-size: 0.9rem; ">Leave a Review</button>
										</a>
										
									@elseif($repair->payment == 'yes' && $repair->complete == 'no')
										<p class="text-center text-green ml-4">Awaiting return of device from fixer</p>
									@endif
								</div>
						
						</div>
					</div>
				</div>

				
			</div>
			<div class="lg:w-1/2 px-3">
				<div class="w-full flex">
					<h1 class=" p-5 mb-5" style="font-family: 'Nunito'; font-size: 2.6rem; float: left">Updates</h1>
					<div style="float: right">
						<a href="/messages/message/{{ $repair->vendor->id }}">
		                    <h3 class="mt-2" style="font-weight:430; font-size: 4rem; margin-top: .6rem; padding-left: 20rem; float: right"><i class="fas fa-envelope"></i> </h3></a>
	                </div>
                </div>
				<div class="mb-8">
					@forelse ($repair->updates as $update)
						<div class="card mb-5" style="height:70%; position: relative;"> 
							<div class="flex w-full">
								<p class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-green pl-4">
								<div class="pt-2 w-full">{{ $update->description }} </div></p>
								<div class="progress-circle" style="font-size: 1rem !important; margin: 0; height: 6rem; width: 7rem;" data-progress="{{ $update->progress }}" style="float: right"></div>
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
