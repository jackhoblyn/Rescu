<a href="/ads/{{ $notification->data['ad']['id'] }}">
	<div style="margin-top: 10px; margin-left: 7px" class="red-border-bottom">
	    <h4 style="color:black"><span style="color: orange"> {{ $notification->data['vendor']['name'] }}</span> responded to '{{ $notification->data['ad']['title'] }}'</h4>
	   	<p style="font-size: 0.9rem; padding: 0.3rem">{{ $notification->created_at->diffForHumans() }}</p>
	</div>
</a>

