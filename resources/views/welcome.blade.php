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
        <link rel="shortcut icon" href="../favicon.ico">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/component.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/content.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script type="text/javascript" src="{!! asset('js/modernizr.custom.js') !!}"></script>
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
                padding: 0 45px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .2rem;
                text-decoration: none !important;
                text-transform: uppercase;
            }

            a{
                text-decoration: none !important;
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
        <nav class="py-5">
            <div style="margin-left: 10%; margin-right: 10%">
                <div class = "flex justify-between items-center">
                    <h1 class="ml-2" style="font-family: 'Nunito'; font-size: 2.6rem;">Rescü</h1>
                    <div>
                    <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                             <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                                <div class="text-sm lg:flex-grow">
                                    <a href="/vendor/home" style="font-size: 1.5rem; font-weight: bold" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4">
                                    Fixer
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

                
                <div class="links" style="margin-top: -8rem; margin-left: 15%; margin-right: 15%">
                    <a href="/register/vendor" style="font-size: 1.4rem; font-weight: bold; max-width: 40%; float: left" class="border border-white rounded block mt-6 lg:inline-block lg:mt-0 text-white hover:bg-orange mr-4">
                        Become a Fixer
                    </a>
                    <a href="{{ route('register') }}" style=" font-size: 1.4rem; font-weight: bold; max-width: 40%; float: right" class="border border-white rounded block mt-6 lg:inline-block lg:mt-0 text-white hover:bg-green mr-6 ml-6">

                        Become a User 
                    </a>    
                </div>
                <div class="morph-button morph-button-overlay morph-button-fixed">
                    <button type="button" style="margin-top: 20%">More Info</button>
                    <div class="morph-content">
                        <div>
                            <div class="content-style-overlay">
                                <span class="icon icon-close"><img src="https://img.icons8.com/metro/26/000000/multiply.png" ></span>
                                <h2 style="font-family: 'Nunito'; font-size: 5rem"><b>Rescü</b></h2>
                                <p>Rescu is a service designed to help everyone to find the best price when getting their device fixed. </p>

                                <p>In 2019, I broke a headphone jack and had to pay $100 to get it fixed, which was a process that involved going to several repair shops where I was quoted a similar price each time. I later found out that a friend could have done it for $30. I thought that a service that heled with this dilema that everyone always seems to face whenever they break one of their devices should definitely exist, so I decided to make it.</p>

                                <p>As phones and similar devices become more and more vital to our daily lives, getting them repaired becomes more and more of a common task and with phone prices seemingly getting higher and higher every year, repair prices are bound to follow. The thing is, there are actually a lot more options than you might think when such a thing occurs, at all sorts of price points, and we want to help you to find a price point that suits you.</p>

                                <p>We also offer a way to make money if you have expertise in fixing phones, computers, tablets, airpods or whatever you find listed on here. Simply apply as a freelancer and start answering ads in your area!</p>

                                <p>If you are a repair shop, register a profile on here and you can find all sorts of jobs in your area. After each job you'll receive a review and become suggested to someone when they make an ad. Communication with customers will also be a lot easier as we have a messaging system and a dashboard to commuicate with customers during repairs.</p>

                                
                            </div>
                        </div>
                    </div>
                </div><!-- morph-button -->
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
                
                var el = document.querySelector( '.morph-button' );
                
                new UIMorphingButton( el, {
                    closeEl : '.icon-close',
                    onBeforeOpen : function() {
                        // don't allow to scroll
                        noScroll();
                    },
                    onAfterOpen : function() {
                        // can scroll again
                        canScroll();
                        // add class "noscroll" to body
                        classie.addClass( document.body, 'noscroll' );
                        // add scroll class to main el
                        classie.addClass( el, 'scroll' );
                    },
                    onBeforeClose : function() {
                        // remove class "noscroll" to body
                        classie.removeClass( document.body, 'noscroll' );
                        // remove scroll class from main el
                        classie.removeClass( el, 'scroll' );
                        // don't allow to scroll
                        noScroll();
                    },
                    onAfterClose : function() {
                        // can scroll again
                        canScroll();
                    }
                } );
            })();
        </script>



    </body>
</html>