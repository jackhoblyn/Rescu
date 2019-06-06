@extends('layouts.vendor')

@section('content')
	<header class="flex items-center mb-4 py-4">
		<div class="flex justify-between mt-2 items-end w-full">
			<p class="text-muted font-light">
                <a href="/vendor/home" class="text-muted no-underline hover:underline">Home</a> /
                <a href="/messages" class="text-muted no-underline hover:underline"> Messages </a> / <b>{{ $convo->user->name }}</b>
            </p>
		</div>
	</header>

	<main>
		<div class="lg:flex -mx-3">
			<div class ="lg:w-full px-3 mb-6">
				<div class="mb-8">
					<div class="w-full">
						<div style="float: right">
							<h2 class="text-lg font-normal mb-8" style="font-size: 3rem; margin-top: -8rem; color: orange; float: right"> <b>{{ $convo->user->name }}</b></h2>
						</div>
					</div>

					<div style="margin-top: 8rem;">
			
					@forelse ($convo->messages as $message)
						@if ($message->sender == 'vendor')
							<div class="w-full" style="min-width: 600px;">
								<div class="card mb-5" style="height:50%; width: 50%; position: relative;"> 
										<div class="flex w-full">
											<a href="/profile">
												<img src="/uploads/avatars/{{ Auth('vendor')->user()->avatar }}" style="width: 42px; height:42px; top:10px; left:10px; border-radius: 50%; margin-bottom: -10px; margin-right: 10px;">
											</a>
											<div class="pt-2 w-full">
												<p style="color: blue">{{ $message->body }} </h2></p>

									
												<p style="font-size: 0.9rem; padding-top: 8px">{{ $message->created_at->diffForHumans() }}</p>
											</div>
										</div>
	
								</div>
							</div>
						@endif
						@if ($message->sender == 'user')
							<div class="w-full">
								<div class="card mb-5" style="height:50%; width: 50%; margin-left: 45rem; position: relative;"> 
									<div class="flex w-full">
										<a href="{{ $message->path() }}">
											<img src="/uploads/avatars/{{ $message->user->avatar }}" style="width: 42px; height:42px; top:10px; left:10px; border-radius: 50%; margin-bottom: -10px; margin-right: 10px;">
										</a>
										<div class="w-full" style="float: right">
											<div class="pt-2 w-full"><p style="color: orange;"> {{ $message->body }} </h2></div></p>
											<p style="font-size: 0.9rem; padding-top: 8px">{{ $message->created_at->diffForHumans() }}</p>
										</div>
									</div>
								</div>
							</div>
						@endif
								
					@empty
						<div class="card mb-3"> Nothing yet! </div>
					@endforelse
					</div>
				</div>
			</div>
		</div>
				<div class="pt-6 mt-6">
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



					