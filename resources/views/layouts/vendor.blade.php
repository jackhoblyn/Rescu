<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rescu</title>

     <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

        <!-- Styles -->
        <link rel="shortcut icon" href="../favicon.ico">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/component.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/content.css') }}" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script type="text/javascript" src="{!! asset('js/modernizr.custom.js') !!}">></script>
    <style>

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
        
       
    </style>

</head>
<body class="bg-grey-light">
    <div id="app">
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

        <div id="container">
            <main style="margin-left: 10%; margin-right: 10%">
                @yield('content')
            </main>
        </div>


        <footer id="footer" style="margin-top: 10rem;">
            <div style="margin-left: 10%; margin-right: 10%">
                <div style="float: right">
                    <h1 class="p-2" style="font-family: 'Nunito'; font-size: 2.6rem;">Rescü</h1>
                </div>
            </div>
        </footer>

    </app>
</body>
</html>