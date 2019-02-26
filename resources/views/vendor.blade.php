@extends('layouts.vendor') 

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="welcome">
                <h3><b>What can we help you with,  {{ Auth('vendor')->user()->name }}? </b></h3>
                <br>
            </div>

                <div class="row">
                <div class="column">
                     <div class="card" style="width:180px">
                        <img class="card-img-top" src={{ asset('img/wrench.png') }} alt="Card image" style="width:100%" >
                            <div class="card-body">
                                    <p>Find ads in your area</p>
                                <a href="/vendor/ads/" class="btn btn-primary">Show map</a>
                            </div>
                    </div>
                </div>

                 <div class="column">
                     <div class="card" style="width:180px">
                        <img class="card-img-top" src={{ asset('img/wrench.png') }} alt="Card image" style="width:100%" >
                            <div class="card-body">
                                    <p>Find freelancers in your area</p>
                                <a href="#" class="btn btn-primary">Create Listing</a>
                            </div>
                    </div>
                </div>

                <div class="column">
                    <div class="card" style="width:180px">
                        <img class="card-img-top" src={{ asset('img/wrench.png') }} alt="Card image" style="width:100%" >
                            <div class="card-body">
                                    <p>Create Rescu Listing</p>
                                <a href="#" class="btn btn-primary">See vendors</a>
                            </div>
                    </div>
                </div>

                <div class="column">
                     <div class="card" style="width:180px">
                        <img class="card-img-top" src={{ asset('img/wrench.png') }} alt="Card image" style="width:100%" >
                            <div class="card-body">
                                    <p>View Profile</p><br>
                                <a href="#" class="btn btn-primary">Create Profile</a>
                            </div>
                    </div>
                </div>
            </div>

  
            

        </div>
    </div>
</div>
@endsection






        