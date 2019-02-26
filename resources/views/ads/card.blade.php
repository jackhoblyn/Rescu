
<div class="card" style="height: 200px">
	<h3 class="font-normal text-xl mb-3 py-4 -ml-5 border-l-4 border-blue-light pl-4">
		<a href="{{ $ad->path() }}" class="text-black no-underline" >{{ $ad->title }}</h3></a>
	</h3>

	<div class="text-grey">{{ str_limit($ad->description, 60) }}</div>

</div>
