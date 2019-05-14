<a href="/vendor/repairs/{{ $notification->data['repair']['id'] }}">
	<div style="margin-top: 10px; margin-left: 7px" class="red-border-bottom">
	    <h4 style="color:black"><span style="color: orange"> {{ $notification->data['user']['name'] }}</span> chose your response on '{{ $notification->data['ad']['title'] }}'</h4>
	   	<p style="font-size: 0.9rem; padding: 0.3rem">{{ $notification->created_at->diffForHumans() }}</p>
	</div>
</a>

