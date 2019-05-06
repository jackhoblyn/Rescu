<a href="/repairs/{{ $notification->data['repair']['id'] }}">
	<div style="margin-top: 10px; margin-left: 7px" class="red-border-bottom">
	    <h4 style="color: black">There is a new update on <span style="color: green"> '{{ $notification->data['repair']['title'] }}'</span></h4>
	   	<p style="font-size: 0.9rem; padding: 0.3rem">{{ $notification->created_at->diffForHumans() }}</p>
	</div>
</a>

