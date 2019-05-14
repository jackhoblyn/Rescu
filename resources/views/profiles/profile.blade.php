@extends('layouts.app')

@section('content')

    <div class="container" style="position: relative;">
        <div style="max-width: 1080px !important; margin-left: auto !important; margin-right: auto !important; width: auto !important; padding-right: 24px !important; padding-left: 24px !important;">
            <div style="margin: 0">
                <div style="margin-top: 70px;">
                    <div style="margin-left:-8px; margin-right: -8px;">
                        <div style="width: 33.33% !important; float: left">
                            <div style="margin-right: 8px; background-color: white">
                                <div style="border: 1px solid #e4e4e4; border-radius: 1px; padding: 24px;">
                                    <section style="display: block">
                                        <div style="text-align: center;">
                                            <div style="box-sizing: border-box;">
                                                <div style="display: inline-block;">
                                                    <a href="profile/{{Auth::user()->id }}/edit">
                                                        <div class = "textWithBlurredBg" style="position: relative; width: 200px; height: 200px; display: block">
                                                            <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style=" border-radius:50%;">
                                                            <h2 style="padding-top: 2rem;">Edit Profile</h2>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-top: 24px; margin-bottom: 24px;">
                                            <div style="border-bottom-width: var(--border-rule-border-width, 4px); border-bottom-color: var(--color-divider, #f6993f); border-bottom-style: solid;">
                                            </div>
                                        </div>
                                        <div style="margin-top: 24px;">
                                            <div style="text-align: center">
                                                <p style="font-size: 20px;"> {{ Auth::user()->city }} </p>
                                            </div>
                                        </div>
                                        <div style="margin-top: 24px;">
                                            <div style="text-align: center">
                                                <p style="font-size: 20px;"> <b>Repairs: {{ Auth::user()->repairs->count() }}</b> </p>
                                            </div>
                                        </div>
                                            
                                        </div>

                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="width: 66.66%; float: left; margin-bottom: 5rem;">
                    <div style="margin-left: 110px;">
                        <div style="box-sizing: border-box; margin-bottom: 15px;">
                            <h3 class="mt-2" style="font-weight:430; font-size: 2.2rem; margin-top: .6rem">Hi, I'm {{ Auth::user()->name }} </h3>
                        </div>
                        <div>
                            <p style="font-size: 1.3rem; color: grey"> Joined in {{ Auth::user()->created_at->year }}</p>
                        </div>

                        
                    
                        <div style="margin-top: 32px;">
                            
                            <div style="height: 60px !important; color: black !important; font-size: 64px !important; font-weight: 700 !important; font-family: helvetica;">"
                            </div>
                            
                            <div style="margin: 0px !important; word-wrap: break-word !important; font-family: Circular,-apple-system,BlinkMacSystemFont,Roboto,Helvetica Neue,sans-serif !important; font-size: 16px !important; font-weight: 400 !important; line-height: 1.375em !important; color: #484848 !important;">

                                {{ Auth::user()->bio }}
                                
                            </div>

                            <div style="margin-top: 3rem; margin-bottom: 4rem;">
                                <div style="border-bottom: 4px solid black !important; width: 8rem !important;">
                                    
                                </div>
                            </div>

                            <div style="margin-top: 1rem; margin-bottom: 1rem;">
                                <h2 style="font-size: 2rem;">{{ Auth::user()->reviews->count() }} Reviews</h2>
                                <div style="margin-top:1.7rem; border-bottom-width: var(--border-rule-border-width, 1px); width:9rem; !important; border-bottom-color: var(--color-divider, green) !important;">      
                                </div>
                            </div> 
                            
                            @forelse (Auth::user()->reviews as $review)
                            <div style="margin-top: 1.3rem;">
                                
                                <p style="font-size: 1.1rem; margin-bottom: 0.6rem;"><b>{{$review->vendor->name}}</b></p>
                                

                                <p style="color: grey"><b>{{$review->created_at->format('M Y')}}</b></p>
                                <div style="margin-top: 1rem;">
                                    <p style="margin-bottom: 1rem;">{{$review->description}}</p>
                                </div>
                                @foreach(range(1,5) as $i)
                                    <span class="fa-stack" style="width:1em">
                                        <i class="far fa-star fa-stack-1x"></i>

                                        @if($review->rating >0)
                                            @if($review->rating >0.5)
                                                <i class="fas fa-star fa-stack-1x"></i>
                                            @else
                                                <i class="fas fa-star-half fa-stack-1x"></i>
                                            @endif
                                        @endif
                                        @php $review->rating--; @endphp
                                    </span>
                                @endforeach
                                
        
                            </div>

                            <div style="margin-top: 2rem; margin-bottom: 1rem">
                                <div style="border-bottom-width: var(--border-rule-border-width, 1px) !important; border-bottom-color: var(--color-divider, grey) !important;">      
                                </div>
                                
                            </div>

                            
                               
                            @empty
                                <div style="margin-top: 15%; margin-left: 15%; padding-top: 7%; font-family: 'Nunito';"><h1>No ads yet!</h1></div>
                            @endforelse

                               
                             
                        </div>
                        
                                                
                    </div>
                    

                </div>
            </div>
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