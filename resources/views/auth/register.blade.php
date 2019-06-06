@extends('layouts.app')

@section('content')
<div class="flex items-center" style="padding-left: 17rem;
    padding-right: 17rem;">
        <div class = "container mx-auto mt-6">
            <form class="mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ml-9" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
            @csrf
                <div class="mb-4">
                    <h1 class="text-center text-2xl text-green-dark mb-6">Register</h1>
                    <label for="name" class="block text-grey-darker text-sm font-bold mb-2">{{ __('Name') }}</label>
                    <div class="mb-4-6">
                        <input id="name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="mb-6">
                    <label for="email" class="block text-grey-darker text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>
                    <div class="mb-4-6">
                        <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block text-grey-darker text-sm font-bold mb-2">{{ __('Password') }}</label>
                        <div class="mb-4-6">
                            <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                            required> @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="password-confirm"class="block text-grey-darker text-sm font-bold mb-2">{{ __('Confirm Password') }}</label>
                        <div class="mb-4-6">
                            <input id="password-confirm" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Register') }}
                    </button>
                    <br><br>
                    <a class="btn btn-link" href="/login">
                    {{ __('Already have an account? Log in') }}
                    </a>
                </form>
            </div>
        </div>          
@endsection
