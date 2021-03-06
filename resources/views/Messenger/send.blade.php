@extends('layouts.app')

@section('content')

	<div class="lg:w-3/5 lg:mx-auto bg-white p-6 md:py-12 mt-6 md:px-16 rounded shadow">

		<h1 class="text-4xl text-red font-normal mb-10 text-center">
           	<b>{{ $vendor->name }}</b>
        </h1>

		 <div class="row justify-content-center">
    
			<form action="{{ $vendor->sendMessage() }}" method="post">
        	{{ csrf_field() }}
        
			<div class="mb-4">

          
	                <input type="hidden" class="mb-6 shadow appearance-none border border-blue-light rounded w-full py-2 px-3 text-grey-darker" value="{{ $vendor->name }}" name="topic" placeholder="Subject">
	           

				<label class="block text-blue text-sm font-bold mb-2 mt-4" for="description" style="font-size: 1.2rem">Message</label>
				<div class="mb-4-6">
					<textarea name="body" class="textarea bg-transparent border border-blue-light rounded p-2 text-m w-full" style="min-height: 200px;" placeholder="Message to Fixer"></textarea>
				</div>

				<input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
				<input type="hidden" name="read" value="no">
				<input type="hidden" name="sender" value="user">
				

				<div class="mb-4-6">
					<button type="submit" class="mt-6 button is-link mr-2" style="float: left;">Send</button>
					
					<a href="/profile">
						<button type="submit" class="mt-6 button is-link mr-2" style="background-color: #fc6821;">Cancel </button>
					</a>
				
				</div>
		</div>
	</form>

@endsection