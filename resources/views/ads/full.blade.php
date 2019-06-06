@extends('layouts.app')

@section('content')
	<header class="flex items-center mb-4 py-4">
		<div class="flex justify-between items-end w-full">
			<p class="text-muted font-light">
                <a href="/home" class="text-muted no-underline hover:underline">Home</a> /
                <a href="/ads" class="text-muted no-underline hover:underline"> Your ads </a> / 
                <a href="/ads/{{ $ad->id }}" class="text-muted no-underline hover:underline"> {{ $ad ->title }} </a>
            </p>
			
		</div>
	</header>

	<main>

		<div class="card mx-auto" style="min-height: 800px; position: relative; margin-bottom: 50px;">
			<div>

				<h3 class="font-normal text-xl mb-3 py-3 -ml-5 border-l-4 border-blue-light pl-7" style = "font-size: 2.4em; float: left">
					<div class="text-black no-underline pt-3 ml-8" ><b>{{ $ad->title }}</b></div>
				</h3>
				<h1 class = "mt-3 pt-2 pr-6 mr-6" style= "color: green; text-align: right; font-size: 5rem;"> €{{ $ad->price }} </h1></br>
			</div>
			<div class="text-grey pt-6 pl-6">
				<h2 class = "pt-1" style = "font-size: 1.7rem;">{{ ($ad->phone) }}</h2>
			</div>
			<div class="text-blue pt-6 pl-6">
				<h2 class = "pt-1" style = "font-size: 1.7rem;">{{ ($ad->user->name) }}</h2>
			</div>

			<div class="text-black pt-9 pl-6 mt-6" style="width: 50%; float: left; margin-top: 4rem">
				<h2 style = "font-size: 1.6rem; padding-top: 5rem">{{ str_limit($ad->description, 740 )}}</h2>
			</div>

			<div class="mt-8 pt-7 pr-6" style="vertical-align: top; display: inline-block;">
				<img class = "mt-6" src="/uploads/photos/{{ $ad->photo }}" alt="Card image" style="max-height: 420px; min-height: 420px; padding-top: 1%; margin-left:10%; border-radius:50%;">
					<div style="display: block; margin-left: 50%">
						<form enctype="multipart/form-data" action="{{$ad->full()}}" method="POST">
							<div class="field mt-3">
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

			
			<div class =" flex w-full" style="margin-left: 10rem; margin-top: 6rem;">
				<a href="{{$ad->edit() }}"><button type="submit" class="button mr-3">Edit</button></a>
				
				<form method="post" action="{{$ad->del() }}">
					@csrf
					<input type="hidden" name="_method" value="DELETE">
					<button type="submit" class="button" style="background-color: red">delete</button>
					
				</form> 
			</div>
					
				
				
			</div>
		
	</main>
	
@endsection




	