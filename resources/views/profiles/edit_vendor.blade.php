@extends('layouts.vendor')

@section('content')

	<div class="lg:w-3/5 lg:mx-auto bg-white p-6 md:py-12 mt-6 md:px-16 rounded shadow">

		<h1 class="text-4xl text-red font-normal mb-10 text-center">
           	<b>Update Profile</b>
        </h1>

		 <div class="row justify-content-center">
        
            <div class="flex mt-2 w-full">
                <div style="margin-left: 20%; margin-bottom: 3rem;">
	                <div class = "py-6 pb-6"><img src="/uploads/avatars/{{ Auth('vendor')->user()->avatar }}" style="width:150px; height: 150px; float:left; border-radius:50%; margin-right: 25px;"></div>
	                    
                    <form enctype="multipart/form-data" action="{{ Auth('vendor')->user()->photo() }}" method="POST">
						<div class="field mt-3">
	                    	<label style="margin-top: .5rem; font-weight: 550;">Update Photo</label>
                    	</div>
                    	<div class="field mt-3" style=" margin-right: 2.5rem;">
	                    	<input type="file" name="avatar" style="margin-top: .2rem">
	                    	@csrf
                    	</div>
                    	<div class="field mt-3" style=" margin-right: 15rem;">
	                    	<input type="submit" class="button center" style="margin-top: .5rem; background-color: #6d34dc; margin-left: 0.6rem;" >
                    	</div>
                	</form>

                </div>

            </div>
			<form method="POST" action="{{Auth('vendor')->user()->edit()}}">
				@csrf
				@method('PATCH')
			<div class="mb-4">

				<label class="block text-blue text-sm font-bold mb-2 block" for="title" style="font-size: 1.2rem">Name</label>
				<div class="mb-4-6">
					<input type="text" class="mb-6 shadow appearance-none border border-blue-light rounded w-full py-2 px-3 text-grey-darker" name="name" placeholder="title" value="{{Auth('vendor')->user()->name}}" style="font-size: 1.2rem">
				</div>

				<label class="block text-blue text-sm font-bold mb-2 block" for="title" style="font-size: 1.2rem">City/Town</label>
				<div class="mb-4-6">
					<input type="text" class="mb-6 shadow appearance-none border border-blue-light rounded w-full py-2 px-3 text-grey-darker" name="city" placeholder="title" value="{{Auth('vendor')->user()->city}}" style="font-size: 1.2rem">
				</div>
			
				<label class="block text-blue text-sm font-bold mb-2 mt-4" for="description" style="font-size: 1.2rem">Bio</label>
				<div class="mb-4-6">
					<textarea name="bio" class="textarea bg-transparent border border-blue-light rounded p-2 text-m w-full" style="min-height: 200px;">{{Auth('vendor')->user()->bio}}</textarea>
				</div>

				<div class="mb-4-6">
					<button type="submit" class="mt-6 button is-link mr-2" style="float: left;">Update</button>
					
					<a href="/vendor/profile">
						<button type="submit" class="mt-6 button is-link mr-2" style="background-color: #fc6821;">Cancel </button>
					</a>
				
				</div>
		</div>
	</form>

@endsection