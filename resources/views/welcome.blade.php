<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rescu</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                height: 100%;
            }

            .bg {
                background-image: url('/img/cover3.jpeg');
                height: 100%;

                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;

            }

            h2{
                font-family: 'Montserrat', sans-serif;
                color: white;
                font-size: 3rem;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                margin-top:-9rem;
            }

            .title {
                font-size: 2rem;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            a{
                text-decoration: none;
            }

            a:hover{
                text-decoration: underline;
            }

            m-b-md {
                margin-bottom: 15rem;
                padding-bottom: 7rem;
            }
        </style>
    </head>
    <body>
        <nav>
            <div class="container mx-auto">
                <div class = "flex justify-between items-center py-3">
                    <h1 class="p-2 ml-2" style="font-family: 'Nunito'; font-size: 2.6rem;">Rescü</h1>
                    <div>
                    <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                             <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                                <div class="text-sm lg:flex-grow">
                                    <a href="/login/vendor" style="font-size: 1.5rem; font-weight: bold" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4">
                                    Vendor
                                    </a>
                                    <a href="{{ route('login') }}" style=" font-size: 1.5rem; font-weight: bold" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-green mr-4 ml-6">
                                    User
                                    </a>       
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>


    <div class = "bg">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-d" style="margin-bottom: 13rem;">
                    <h2>Get the right price when fixing your device</h2>
                </div>

                
                <div class="links" style="margin-top: -8rem;">
                    <a href="/register/vendor" style="font-size: 1.4rem; font-weight: bold" class="border border-white rounded block mt-4 lg:inline-block lg:mt-0 text-white hover:bg-orange mr-4">
                        Become a Fixer
                    </a>
                    <a href="{{ route('register') }}" style=" font-size: 1.4rem; font-weight: bold" class="border border-white rounded block mt-6 lg:inline-block lg:mt-0 text-white hover:bg-green mr-6 ml-6">

                        Become a User
                    </a>    
                </div>
            </div>
        </div>
    </div>



    </body>
</html>