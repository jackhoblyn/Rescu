<div class="card mt-3">
	<ul class="text xs list-reset">
		@foreach ($ad->activity as $activity)
			<li class="{{ $loop->last ? '' : 'mb-1'}}">

				@include ("ads.activity.{$activity->description}")

			</li>
		@endforeach
	</ul>

</div>