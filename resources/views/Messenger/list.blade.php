@extends('layouts.vendor')

@section('content')
	<header class="flex items-center mb-4 py-4">
		<div class="flex justify-between mt-2 items-end w-full">
			<p class="text-muted font-light">
                <a href="/home" class="text-muted no-underline hover:underline">Home</a> /
                <a href="/ads" class="text-muted no-underline hover:underline"> Messages </a> / {{ $convo->topic }} || {{ $convo->user->name }}
            </p>
		</div>
	</header>

	<main>
		<div class="lg:flex -mx-3">
			<div class ="lg:w-3/4 px-3 mb-6">
				<div class="mb-8">
					<h2 class="text-lg text-grey font-normal mb-3">{{ $convo->topic }} || {{ $convo->user->name }}</h2>
			
					@forelse ($convo->messages as $message)
						@if ($message->sender == 'vendor')
							<div class="w-full" style="min-width: 600px;">
								<div class="card mb-5" style="height:50%; width: 50%; position: relative;"> 

										<div class="flex w-full">
											<div class="pt-2 w-full"><p style="color: blue">{{ $message->body }} </h2></div></p>
										</div>
								</div>
							</div>
						@endif
						@if ($message->sender == 'user')
							<div class="w-full">
								<div class="card mb-5" style="height:50%; width: 50%; margin-left: 45rem; position: relative;"> 

										<div class="flex w-full">
											<div class="w-full" style="float: right">
												<div class="pt-2 w-full"><p style="color: orange;"> {{ $message->body }} </h2></div></p>
											</div>
											
										</div>
								</div>
							</div>
						@endif
								
					@empty
						<div class="card mb-3"> Nothing yet! </div>
					@endforelse
				</div>
				<div class="pt-6">
						<h3 class ="mb-6">Write a mesage</h3>
							<form action="{{ $convo->list(). '/reply' }}" method="POST">
								@csrf              
								<div class="pt-6 mb-3">

									<label class="block text-blue text-sm font-bold mb-2 mt-4" for="description" style="font-size: 1.2rem">Message</label>

									<div class="mb-4-6">
										<textarea name="body" class="mb-6 shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" style="min-height: 200px;" placeholder="Your Response" ></textarea>
									</div>

									<input type="hidden" name="read" value="no">
									<input type="hidden" name="sender" value="vendor">

									<div class="pt-2">
										<button type="submit" class="button">Send Message</button>
									</div>
								</div>
							</form>

						</div>
			</div>
			

	</main>
	
	
@endsection



					