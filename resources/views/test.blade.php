<div id="content" style="width:280px; height: 300px; border-style: solid; border-color: green; text-align: center"> 
	<a href="/view/. " style="text-decoration: none">
		<h1 style="font-family: calibri; "> Lidl Repairs  </h1>
		<div style="text-align: center;">
            <div style="display: inline-block;">
                <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style=" border-radius:50%; max-height: 100px; max-width: 100px;">
            </div>
        </div>
        <div style="margin-top: 12px; font-size: 1.5rem;">
            @foreach(range(1,5) as $i)
                <span class="fa-stack" style="width:1em">
                <i class="far fa-star fa-stack-1x"></i>

                @if(Auth('vendor')->user()->rating >0)
                    @if(Auth('vendor')->user()->rating >0.5)
                        <i class="fas fa-star fa-stack-1x"></i>
                    @else
                        <i class="fas fa-star-half fa-stack-1x"></i>
                    @endif
                @endif
                @php Auth('vendor')->user()->rating--; @endphp
                </span>
            @endforeach
            ({{ Auth('vendor')->user()->reviews->count() }})
        </div>
	</a>
</div>'




$marker['infowindow_content'] = '<div id="content" style="width:280px; height: 300px; border-style: solid; border-color: green; text-align: center"> <a href="/view/' . $link . '" style="text-decoration: none"><h1 style="font-family: calibri; ">' . $name . '</h1> <div style="text-align: center;"> <div style="display: inline-block;"> <img src="/uploads/avatars/' . $image . '" style=" border-radius:50%; max-height: 100px; max-width: 100px;"> </div> </div> <div style="margin-top: 12px; font-size: 1.5rem;">@foreach(range(1,5) as $i)<span class="fa-stack" style="width:1em"><i class="far fa-star fa-stack-1x"></i> @if('. $rating .' >0)@if(' . $rating .' >0.5)<i class="fas fa-star fa-stack-1x"></i>@else<i class="fas fa-star-half fa-stack-1x"></i>@endif @endif </span> @php' . $rating.'--;@endphp</span>@endforeach</div></a></div>';