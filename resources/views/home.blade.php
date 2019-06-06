@extends('layouts.app')

@section('content')
<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="flex mt-3 w-full">
                    <h2 class="mt-6 pt-6" style="margin-bottom: .6rem; font-family: 'Nunito', sans-serif;">What can we help you with,  {{ Auth::user()->name }}? </h2>
                </div>
            </div>
        </div>
    </div>

    <div class ="mb-5 "style="position: relative; min-height: 450px; margin-top: 1rem;">
        <a href="/ads/create">
            <img class = "mt-1" role="presentation" sizes="100vw" src={{ asset('img/hand.jpg') }} style="width: 100%; height: 50%; position: absolute; object-fit: cover; object-position: center; min-height: 450px; min-width: 900px;">
            <div style="position: absolute; top: 52%; left: 50%; transform: translate(-50%, -50%); font-size: 1.1rem; font-weight: bold" class="border rounded text-white border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0 px-4 py-4">
                    Create New Ad
            </div>
          
        </a>
    </div>

    <div class = "w-full" style="box-sizing: border-box; margin-top: 20px;">
        <a href="/ads">
            <div class = "viewbox">
                <div class="w-1/3" style="display: inline-block; white-space: normal; vertical-align: top; float: left;">
                    <div style="padding-right: 8px;">
                        <div style="position: relative;">
                            <div style="background-size: 100% 100%;">
                                <img role="presentation" sizes="100vw" src={{ asset('img/viewbox.jpg') }} style=" position: relative; object-fit: cover; object-position: center; min-height: 330px;">
                            </div>
                              <div style="position: absolute; top: 52%; left: 50%; transform: translate(-50%, -50%); font-size: 1.1rem; font-weight: bold" class="bg-white border rounded text-black border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0 px-4 py-4">
                                Your Ads
                             </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </a>
    

        <a href="/map">
            <div style="width: 33.222%; display: inline-block; white-space: normal; vertical-align: top;">
                <div style="padding-left: 8px; padding-right: 8px;">
                    <div style="position: relative;">
                        <div style="background-size: 100% 100%;">
                            <img role="presentation" sizes="100vw" src={{ asset('img/map.jpg') }} style=" position: relative; object-fit: cover; object-position: center; min-height: 330px; max-height: 330px; min-width: 100%">
                        </div>
                        <div style="position: absolute; top: 52%; left: 50%; transform: translate(-50%, -50%); font-size: 1.1rem; font-weight: bold" class="bg-white border rounded text-black border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0 px-4 py-4">
                                Local Shops
                         </div>
                    </div>
                </div>
            </div>
        </a>
      

        <a href="/repairs">
            <div style="width: 33.222%; display: inline-block; white-space: normal; vertical-align: top; float: right;">
                <div style="padding-left: 8px;">
                    <div style="position: relative;">
                        <div style="background-size: 100% 100%;">
                            <img role="presentation" sizes="100vw" src={{ asset('img/big-solder.jpeg') }} style=" position: relative; object-fit: cover; object-position: center; min-width: 100%; min-height: 330px; max-height: 330px;">
                        </div>
                         <div style="position: absolute; top: 52%; left: 50%; transform: translate(-50%, -50%); font-size: 1.1rem; font-weight: bold" class="bg-white border rounded text-black border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0 px-4 py-4">
                            Active Repairs
                         </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class = "w-full" style="box-sizing: border-box; margin-top: 20px; margin-bottom: 15%">
        <div style="width: 49%; float: left;">
            <a href="/messages">
                <div style="background-size: 100% 100%;">
                    <img role="presentation" sizes="100vw" src={{ asset('img/3.jpg') }} style="position: relative; object-fit: cover; object-position: center; min-width: 100%; max-height: 330px; min-height: 330px;">
                        <div style="position: absolute; bottom: -43%; left: 30%; transform: translate(-50%, -50%); font-size: 1.1rem; font-weight: bold" class="bg-white border rounded text-black border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0 px-4 py-4">
                            Messages
                        </div>
                </div>


            </a>
        </div>

        <div style="width: 49%; float:right">
            <a href="/finished">
                <div style="background-size: 100% 100%;">
                    <img role="presentation" sizes="100vw" src={{ asset('img/iphone-fix.jpeg') }} style="position: relative; object-fit: cover; object-position: center; min-width: 100%; max-height: 330px; min-height: 330px;">
                    <div style="position: absolute; bottom: -43%; left: 70%; transform: translate(-50%, -50%); font-size: 1.1rem; font-weight: bold" class="bg-white border rounded text-black border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0 px-4 py-4">
                            Finished Repairs
                        </div>

                </div>
            </a>
        </div>
    </div>

    


    <!-- <div class = "w-full" style="box-sizing: border-box; margin-top: 20px;">
        <a href="/ads">
            <div class = "viewbox">
                <div style="width: 50%; display: inline-block; white-space: normal; vertical-align: top; float: left;">
                    <div style="padding-right: 8px;">
                        <div style="position: relative;">
                            <div style="background-size: 100% 100%;">
                                <img role="presentation" sizes="100vw" src={{ asset('img/iphone-fix.jpeg') }} style=" position: relative; object-fit: cover; object-position: center; min-height: 330px; max-height: 330px; width: 100%">
                            </div>

                              <div style="position: absolute; top: 52%; left: 50%; transform: translate(-50%, -50%); font-size: 1.1rem; font-weight: bold" class="bg-white border rounded text-black border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0 px-4 py-4">
                                View Yours Ads
                             </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <a href="/repairs">
            <div style="width: 50%; display: inline-block; white-space: normal; vertical-align: top; float: right;">
                <div style="padding-left: 8px;">
                    <div style="position: relative;">
                        <div style="background-size: 100% 100%;">
                            <img role="presentation" sizes="100vw" src={{ asset('img/big-solder.jpeg') }} style=" position: relative; object-fit: cover; object-position: center; min-width: 100%; max-height: 330px;">
                        </div>
                         <div style="position: absolute; top: 52%; left: 50%; transform: translate(-50%, -50%); font-size: 1.1rem; font-weight: bold" class="bg-white border rounded text-black border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0 px-4 py-4">
                            Your Repairs
                         </div>
                    </div>
                </div>
            </div>
        </a>
    </div> -->
</div>
            
@endsection