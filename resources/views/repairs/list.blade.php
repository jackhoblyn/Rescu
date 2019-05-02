@extends('layouts.vendor')

@section('content')
	<header class="flex items-center mb-4 py-4">
		<div class="flex justify-between items-end w-full">
			<p class="text-grey text-sm font-normal">
				<a href="/vendor/repairs" class="text-grey text-sm font-normal no-underline">My Repairs</a> / {{ $repair ->title }}
			</p>
			
		</div>
	</header>

	<main>
		<div class="lg:flex -mx-3">
			<div class ="lg:w-1/2 px-3 mb-6">

				<div class="card" style="height: 100%; position: relative; ">
					<div>
						<h3 class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-blue-light pl-4" style = "float: left">
							<div class="text-black no-underline" >{{ $repair->title }}</div>
						</h3>

						<h1 style= "color: green; text-align: right; font-size: 3rem;"> €{{ $repair->price }} </h1></br>

						<div class="text-blue pt-6 pb-6">
							<h2 class = "pt-1" style = "font-size: 1.2rem;">{{ ($repair->user->name) }}</h2>
						</div>
						

						<div class="text-grey">{{ str_limit($repair->description, 150) }}</div>
						
						<div class="flex w-full pt-3" style="align-items: center; justify-content: center;">
							<img class = "center pt-6 mt-6" sizes="100vw" src="/uploads/photos/{{ $repair->pic }}" alt="Card image" style="position: relative; object-fit: cover; object-position: center; min-height: 270px; max-width: 270px; border-radius:50%; float: right;">
							<div class="progress-circle" data-progress="{{ $repair->progress }}" style="float: right; font-size: 3rem;"></div>
						</div>
						<div class = "center mt-8 pt-6">
							<a href="{{ $repair->fullAd() }}" style="text-decoration: none">
								<div class="flex w-full pt-3" style="align-items: center; justify-content: center;">
									<button type="submit" class="button center" style="min-width: 8rem; font-size: 0.9rem; ">View details</button>


									<form method="POST" action="{{ $repair->list() }}">
										{{ method_field('DELETE') }}
										@csrf
										<button type="submit" onclick="return confirm('Are you sure you want to cancel this repair?')" class="button" style=" margin-left: 3rem; min-width: 8rem; font-size: 0.9rem; ">Cancel Repair</button>
										
									</form>
								</div>
							</a>
						</div>
					</div>
				</div>

				
			</div>
			<div class="lg:w-1/2 px-3">
				<h1 class=" p-5 mb-5" style="font-family: 'Nunito'; font-size: 2.6rem;">Updates</h1>
				<div class="mb-8">
					@forelse ($repair->updates as $update)
						<div class="card mb-5" style="height:70%; position: relative;"> 
							<div class="flex w-full">
								<p class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-green pl-4">
								<div class="pt-2 w-full">{{ $update->description }} </div></p>
								<div class="progress-circle" style="font-size: 1rem !important; margin: 0; height: 5rem; width: 5rem;" data-progress="{{ $update->progress }}" style="float: right"></div>
							</div>
						</div>
					@empty
						<div class="card mb-3"> Nothing yet! </div>
						<!-- {{$repair->ad->title}}
						{{$repair->user->name}}
						{{$repair->response->description}}
						{{$repair->vendor->name}} -->
					@endforelse
				</div>

						<div style="float: right">
							<div class="morph-button morph-button-modal morph-button-modal-2 morph-button-fixed" >
								<button type="button" style="border-radius: 50%; max-width: 6rem; margin-left: 75%"><img src="https://img.icons8.com/pastel-glyph/64/000000/plus.png"></button>
								<div class="morph-content">
									<div>
										<div class="content-style-form content-style-form-1">
											<span class="icon icon-close">Close</span>
											<h2>Post update</h2>

											<form action="{{ $repair->list(). '/updates' }}" method="POST">
												@csrf
												<p><label>Update Description</label><input type="text" name="description" /></p>
												<p><label>Progress</label></p>

												<select name="progress">
													<option value=10>10</option>
													<option value=20>20</option>
													<option value=30>30</option>
													<option value=40>40</option>
													<option value=50>50</option>
													<option value=60>60</option>
													<option value=70>70</option>
													<option value=80>80</option>
													<option value=90>90</option>
													<option value=100>100</option>
												</select>
												
												<p><button>Post Update</button></p>

											</form>
										</div>
									</div>
								</div>
							</div><!-- morph-button -->
						</div>
				</div>
				
			</div>

			</div>





			</div>

		</div>
		<script src="{!! asset('js/classie.js') !!}"></script>
        <script src="{!! asset('js/uiMorphingButton_fixed.js') !!}"></script>
        <script>
			(function() {
				var docElem = window.document.documentElement, didScroll, scrollPosition;

				// trick to prevent scrolling when opening/closing button
				function noScrollFn() {
					window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
				}

				function noScroll() {
					window.removeEventListener( 'scroll', scrollHandler );
					window.addEventListener( 'scroll', noScrollFn );
				}

				function scrollFn() {
					window.addEventListener( 'scroll', scrollHandler );
				}

				function canScroll() {
					window.removeEventListener( 'scroll', noScrollFn );
					scrollFn();
				}

				function scrollHandler() {
					if( !didScroll ) {
						didScroll = true;
						setTimeout( function() { scrollPage(); }, 60 );
					}
				};

				function scrollPage() {
					scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
					didScroll = false;
				};

				scrollFn();

				[].slice.call( document.querySelectorAll( '.morph-button' ) ).forEach( function( bttn ) {
					new UIMorphingButton( bttn, {
						closeEl : '.icon-close',
						onBeforeOpen : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterOpen : function() {
							// can scroll again
							canScroll();
						},
						onBeforeClose : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterClose : function() {
							// can scroll again
							canScroll();
						}
					} );
				} );

				
			})();
		</script>

	</main>
	
	
@endsection
