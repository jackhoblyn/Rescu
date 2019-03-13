@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="flex mt-2 w-full">
                    <div style="margin-left: 6%">
                    <div class = "py-6 pb-6"><img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:150px; height: 150px; float:left; border-radius:50%; margin-right: 25px;"></div>
                        <h3 class="mt-2" style="font-weight:700; font-size: 1.5rem; margin-bottom: .6rem;">What can we help you with,  {{ Auth::user()->name }}? </h3>
                            <form enctype="multipart/form-data" action="/home" method="POST">
                                <label style="margin-top: .5rem; font-weight: 550;">Update Profile Picture</label>
                                <input type="file" name="avatar" style="margin-top: .2rem">
                                @csrf
                                <input type="submit" class="button" style="margin-top: .5rem">
                            </form>
                    </div>
                    <div style="float: right; margin-left: auto; margin-top: 4rem; margin-right: 2rem;">
                        <h1 style="font-size: 3rem;"><b>Home</b></h1>
                    </div>
                       
                    </div>
                </div>
            </div>
        </div>


       <div class ="mt-4 pt-6"style="position: relative; min-height: 400px; margin-top: 2%;">
            <a href="/ads/create">
              <div class = "mx-auto">
                <img class = "mt-1" role="presentation" sizes="100vw" src={{ asset('img/parlx.jpg') }} style="width: 100%; height: 40%; position: absolute; object-fit: cover; object-position: center; max-width: 1200px; min-height: 400px; min-width: 900px;">
                    <div style="position: absolute; top: 52%; left: 50%; transform: translate(-50%, -50%); font-size: 1.1rem; font-weight: bold" class="border rounded text-white border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0 px-4 py-4">
                        Create New Ad
                    </div>
              </div>
            </a>
        </div>

        <div class = "mt-6 pt-6"style="position: relative;">
             <a href="/ads">
              <div class = "card">
                        View your ads
              </div>
            </a>
        </div>

        <div class = "mt-6 pt-6"style="position: relative;">
             <a href="/ads">
              <div class = "card">
                        View your ads
              </div>
            </a>
        </div>

        <div class = "mt-6 pt-6"style="position: relative;">
             <a href="/ads">
              <div class = "card">
                        View your ads
              </div>
            </a>
        </div>
    </div>


        


  
            

        </div>
    </div>
</div>
@endsection



<!-- <div class="card" style="width:180px">
                <img class="card-img-top" src={{ asset('img/wrench.png') }} alt="Card image" style="width:100%" >
                    <div class="card-body">
                        <h4 class="card-title">Find repair shops in your area</h4>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
            </div> -->