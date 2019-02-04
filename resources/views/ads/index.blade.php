<!DOCTYPE html>
<html>

<head>
	<title>ADS</title>
</head>

<body>
	<h1>ADS</h1>

	<ul>
		@forelse($ads as $ad)
			<li> 
				<a href ="{{ $ad->path() }}">{{ $ad->title }}</a>
			</li>
		@empty
			<li>No Ads to Display</li>
		
		@endforelse
	</ul>
	
</body>

</html>