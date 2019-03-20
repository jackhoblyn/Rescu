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
    </style>
    {!! $map['js'] !!}
</head>
<body class="bg-grey-light">
	<nav class="bg-white">
            <div class="container mx-auto">
                <div class = "flex justify-between items-center py-3">
                    <h1 class="p-2">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="/img/red-cross.png" alt="Rescu" style="max-height: 35px"> Rescu
                        </a>
                    </h1>
                    <div>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                             <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                                <div class="text-sm lg:flex-grow">
                                  <a href="/login/vendor" style="text-decoration:none; font-size: 1.1rem; font-weight: bold" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4">
                                    Vendor
                                  </a>
                                  <a href="{{ route('login') }}" style="text-decoration:none; font-size: 1.1rem; font-weight: bold" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4">
                                    User
                                  </a>
                        
                                </div>
                                <div>
                                  <a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0">Download</a>
                                </div>
                              </div>

                            @else
                                 <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                                    <div class="text-sm lg:flex-grow">

                                        <a href="/profile" style="text-decoration:none; font-size: 1.1rem; font-weight: bold; position: relative;" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4">
                                            <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width: 42px; height:42px; top:10px; left:10px; border-radius: 50%; margin-bottom: -10px; margin-right: 10px;">
                                           {{ Auth::user()->name }}
                                        </a>

                                        <a href="/home" style="text-decoration:none; font-size: 1.1rem; font-weight: bold" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4">
                                            Home
                                        </a>
                                        <a href="{{ route('logout') }}" style="text-decoration:none; font-size: 1.1rem; font-weight: bold" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                        
                                    </div>
                                </div>

                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
	<main>
		<div class="card mx-auto" style="max-height: 90%; position: relative; margin-bottom: 50px;">
		    <h3>Repair shops near you</h3>
		   {!! $map['html'] !!}
		</div>
  </main>
</body>
</html>
	


