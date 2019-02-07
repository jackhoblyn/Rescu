@extends('layouts.app')

@section('content')
	<h1>{{ $ad->title }}</h1>

	<div> {{ $ad->phone }} </div>
	<div> {{ $ad->description }} </div>
	<div> {{ $ad->price }} </div>

	<a href="/ads">Back</a>
	
@endsection