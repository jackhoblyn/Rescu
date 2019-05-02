<a href="#"><h4 style="font-family: 'Nunito', sans-serif;">



<h5>{{ $notification->data['vendor_name'] }} responded to {{ $notification->data['ad_name'] }}</h5>
<p>{{ $notification->created_at->diffForHumans() }}</p> 


</a></div>



 <div class="items-center absolute border border-t-0 rounded-b-lg p-1 bg-white p-2 invisible group-hover:visible w-full" style="min-width: 400px; z-index: 1; padding-top: 30px">
    @foreach(Auth::user()->notifications as $notification)
        <div style="margin-top: 10px; margin-left: 7px">
            <a href="#"><h4 style="font-family: 'Nunito', sans-serif;">{{ $notification->data['vendor_name'] }} responded to {{ $notification->data['ad_name'] }}</h4></a>
            <p>{{ $notification->created_at->diffForHumans() }}</p>
        </div>
    @endforeach
   
  </div>
        
</div>