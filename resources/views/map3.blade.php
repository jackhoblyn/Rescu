<!DOCTYPE html>
<html lang="en">
<head>

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
	<style>
        #map {
        height: 600px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }

       #map_canvas{
        min-height: 600px;
       }
    </style>
    {!! $map['js'] !!}
</head>
<body class="bg-grey-light">
	<nav class="py-4 bg-white">
            <div style="margin-left: 10%; margin-right: 10%">
                <div class = "flex justify-between items-center">
                        <a href="{{ url('/') }}">
                            <h1 class="p-2" style="font-family: 'Nunito'; font-size: 2.6rem;">Rescü</h1>
                        </a>
                    <div>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                        @if(!(Auth('vendor')->user()))
                           <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                                <div class="text-sm lg:flex-grow">
                                    <a href="{{ route('login') }}" style="font-size: 1.5rem; font-weight: bold" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4">
                                    User Login
                                    </a>
                                </div>
                            </div>
                        @else
                         <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                            <div class="text-sm lg:flex-grow">

                            <a href="#" style="text-decoration:none; font-size: 1.1rem; font-weight: bold; position: relative;" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4">
                                {{ Auth('vendor')->user()->name }}
                            </a>

                            <a href="/vendor/home" style="text-decoration:none; font-size: 1.1rem; font-weight: bold" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4">
                                Home
                            </a>

                            <a href="{{ route('logout') }}" style="text-decoration:none; font-size: 1.1rem; font-weight: bold" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                                <form id="logout-form" action="{{ route('logout.vendor') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </ul>     
                @endif
                </div>
            </div>
        </nav>
	<main>
		<div class="card mx-auto" style="min-height: 600px; position: relative; margin-bottom: 50px;">
		    <h3>Repair shops near you</h3>
		   <div id="map">{!! $map['html'] !!}</div>
		</div>
  </main>
</body>
</html>
	


