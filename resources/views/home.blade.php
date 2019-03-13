@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="flex mt-3 w-full">
                <h2 class="mt-1" style="margin-bottom: .6rem;">What can we help you with,  {{ Auth::user()->name }}? </h2>
            </div>
            
        </div>
    </div>
</div>
        


<div class ="mt-3 mb-5 "style="position: relative; min-height: 350px;">
    <a href="/ads/create">
      <div class = "mx-auto">
        <img class = "mt-1" role="presentation" sizes="100vw" src={{ asset('img/parlx.jpg') }} style="width: 100%; height: 40%; position: absolute; object-fit: cover; object-position: center; max-width: 1200px; min-height: 310px; min-width: 900px;">
            <div style="position: absolute; top: 52%; left: 50%; transform: translate(-50%, -50%); font-size: 1.1rem; font-weight: bold" class="border rounded text-white border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0 px-4 py-4">
                Create New Ad
            </div>
      </div>
    </a>
</div>

<div class = "w-full" style="box-sizing: border-box; margin-top: -45px;">
    <a href="/ads">
        <div class = "viewbox">
            <div class="w-1/3" style="display: inline-block; white-space: normal; vertical-align: top; float: left;">
                <div style="padding-right: 8px;">
                    <div style="position: relative;">
                        <div style="background-size: 100% 100%;">
                            <img role="presentation" sizes="100vw" src={{ asset('img/viewbox.jpg') }} style=" position: relative; object-fit: cover; object-position: center; min-height: 300px;">
                        </div>
                         <!-- <div style="position: absolute; top: 52%; left: 50%; transform: translate(-50%, -50%); font-size: 1.1rem; font-weight: bold" class="border rounded text-white border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0 px-4 py-4">
                            View Yours Ads
                         </div> -->

                          <div style="position: absolute; top: 52%; left: 50%; transform: translate(-50%, -50%); font-size: 1.1rem; font-weight: bold" class="bg-white border rounded text-black border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0 px-4 py-4">
                            View Yours Ads
                         </div>
                    
                    </div>
                </div>
            </div>
        </a>
    </div>

    <a href="/map">
        <div style="width: 33.222%; display: inline-block; white-space: normal; vertical-align: top";>
            <div style="padding-left: 8px; padding-right: 8px;">
                <div style="position: relative;">
                    <div style="background-size: 100% 100%;">
                        <img role="presentation" sizes="100vw" src={{ asset('img/map.jpg') }} style=" position: relative; object-fit: cover; object-position: center; min-height: 300px; max-height: 300px; min-width: 100%">
                    </div>
                    <div style="position: absolute; top: 52%; left: 50%; transform: translate(-50%, -50%); font-size: 1.1rem; font-weight: bold" class="bg-white border rounded text-black border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0 px-4 py-4">
                            Local Shops
                     </div>
                </div>
            </div>
        </div>
    </a>
  

    
        <div style="width: 33.222%; display: inline-block; white-space: normal; vertical-align: top; float: right;">
            <div style="padding-left: 8px;">
                <div style="position: relative;">
                    <div style="background-size: 100% 100%;">
                        <img role="presentation" sizes="100vw" src={{ asset('img/3.jpg') }} style=" position: relative; object-fit: cover; object-position: center; min-height: 300px;">
                    </div>
                     <div style="position: absolute; top: 52%; left: 50%; transform: translate(-50%, -50%); font-size: 1.1rem; font-weight: bold" class="bg-white border rounded text-black border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0 px-4 py-4">
                        Previous Repairs
                     </div>
                </div>
            </div>
        </div>
    
</div>

<div class="footer">
    <p> footer</p>
</div>








        


  
            
@endsection



<!-- <div class="card" style="width:180px">
                <img class="card-img-top" src={{ asset('img/wrench.png') }} alt="Card image" style="width:100%" >
                    <div class="card-body">
                        <h4 class="card-title">Find repair shops in your area</h4>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
            </div> -->