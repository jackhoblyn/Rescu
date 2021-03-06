<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Rescu</title>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    @yield('extra css')

    <style>
        .checked {
            color: orange;
        }

        html,body {
            height: 100%;
        }

        #container {
            min-height: 100%;
        }

        main{
            padding-bottom: 100px;

        }

        #footer
        {
            background-color: white;
            position: relative;
            height: 100px;
            clear:both;
        }

        #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */

        }
        
       
    </style>
</head>

<body class="bg-grey-light mt-auto mr-auto">
    <div id="app" style="overflow: hidden; display: block;">
        <nav class="py-4 bg-white">
            <div style="margin-left: 10%; margin-right: 10%">
                <div class = "flex justify-between items-center">
                        <a href="{{ url('/home') }}">
                            <h1 class="p-2 text-green-dark" style="font-family: 'Nunito'; font-size: 2.6rem;">Rescü</h1>
                        </a>
                    <div>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                             <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                                <div class="text-sm lg:flex-grow">
                                  <a href="/login/vendor" style="font-size: 1rem; font-weight: bold" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4">
                                    Fixer
                                    </a>
                                </div>
                              </div>

                            @else
                                 <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                                    <div class="relative group mt-2">
                                      <div class="relative group">
                                          <div class="flex items-center cursor-pointer text-sm text-blue border border-white border-b-0  group-hover:border-grey-light rounded-t-lg py-1 px-2">
                                            <i class="fas fa-envelope" style="font-size: 1rem; margin-right:1rem"></i>
                                            <span class="badge">{{ count(Auth::user()->messages) }}</span>
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                          </div>
                                          <div class="items-center absolute border border-t-0 rounded-b-lg p-1 bg-white p-2 invisible group-hover:visible w-full" style="min-width: 500px; z-index: 1; padding-top: 30px">
                                            @foreach(Auth::user()->messages as $message)
                                                <a href="/messages/{{ $message->convo_id }}">
                                                    <div style="margin-top: 10px; margin-left: 7px" class="red-border-bottom">
                                                        <h4 style="color:black"><span style="color: #6cb2eb"> {{ $message->vendor->name}} </span> : {{ $message->body }}'</h4>
                                                        <p style="font-size: 0.9rem; padding: 0.3rem">{{ $message->created_at->diffForHumans() }}</p>
                                                    </div>
                                                </a>
                                                 <div>
                                                    <div style="border-bottom: 2px solid black !important; width: 29rem !important;">
                                                        
                                                    </div>
                                                </div>
                                            @endforeach
                                            @if( Auth::user()->messages->count() > 0 )
                                                <div style="padding-left: 24rem;">
                                                    <form method="POST" action ='/clearMessages'>
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="button" style="background-color: #6cb2eb; margin-top: 1rem;">Clear</button>
                                                    </form>
                                                </div>
                                            @endif                                      
                                          </div>     
                                        </div>
                                    </div>
                                    <div class="relative group mt-2">
                                      <div class="relative group">
                                          <div class="flex items-center cursor-pointer text-sm text-blue border border-white border-b-0  group-hover:border-grey-light rounded-t-lg py-1 px-2">
                                            <i class="fa fa-bell" style="font-size: 1rem; margin-right:1rem"></i>
                                            <span class="badge">{{ count(Auth::user()->unreadNotifications) }}</span>
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                          </div>
                                          <div class="items-center absolute border border-t-0 rounded-b-lg p-1 bg-white p-2 invisible group-hover:visible w-full" style="min-width: 500px; z-index: 1; padding-top: 30px">
                                            @foreach(Auth::user()->unreadNotifications as $notification)
                                                <div>
                                                    <div style="border-bottom: 2px solid black !important; width: 29rem !important;">
                                                        
                                                    </div>
                                                </div>
                                                @include ('notifications.' .snake_case(class_basename($notification->type)))

                                            @endforeach
                                            @if( Auth::user()->unreadNotifications->count() > 0 )
                                                <div style="padding-left: 24rem;">
                                                    <form method="GET" action ='/notifications'>
                                                        <button type="submit" class="button" style="background-color: #6cb2eb;">Clear</button>
                                                    </form>
                                                </div>
                                            @endif                                      
                                          </div>     
                                        </div>
                                    </div>
                                    <div class="text-sm lg:flex-grow">

                                        <div class="relative group" style="z-index: 2">
                                           
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

        <div id="app">
            <main style="margin-left: 10%; margin-right: 10%">
                @yield('content')
                <flash message="{{ session('flash') }}"></flash>
                <!-- <flash message="yo dawg"></flash> -->
            </main>
        </div>


        <footer id="footer" style="margin-top: 13rem;">
            <div style="margin-left: 10%; margin-right: 10%">
                <div style="float: right">
                    <h1 class="p-2" style="font-family: 'Nunito'; font-size: 2.6rem;">Rescü</h1>
                </div>
            </div>
        </footer>
       
    </app>
    
</body>
</html>