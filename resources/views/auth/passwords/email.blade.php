@extends('layouts.app')

@section('content')
<div class="flex items-center" style="padding-left: 10rem;
    padding-right: 10rem;">
    <div class = "container mx-auto" style="padding-right: 7rem; padding-left: 7rem; padding-top: 3rem; margin-top: 3rem; margin-bottom: 9rem;">
        <div class="mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ml-9">
            <div class="mb-4">
                <h1 class="text-center text-2xl text-green-dark mb-6">Reset Password</h1>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="block text-grey-darker text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>

                            <div class="mb-4-6">
                                <input id="email" type="email" class="hadow appearance-none border rounded w-full py-2 px-3 text-grey-darker form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-6">
                            <div class="mt-5">
                                <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



  

                            

                        