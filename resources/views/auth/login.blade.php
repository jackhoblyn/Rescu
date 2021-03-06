@extends('layouts.app')

@section('content')
<div class="flex items-center" style="padding-left: 10rem;
    padding-right: 10rem;">
    <div class = "container mx-auto" style="padding-top: 3rem; margin-top: 3rem; max-width: 34rem; min-width: 34rem;">
        <form method="POST" class="mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ml-9" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf
            <div class="mb-4">
                <h1 class="text-center text-2xl text-green-dark mb-6">Login</h1>

                <label for="email" class="block text-grey-darker text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>
                
                <div class="mb-4-6">
                    <input id="email" type="email" class=" shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                      @if ($errors->has('email'))
                      <div class=mt-4>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      </div>
                      @endif      

                </div>
              </div>
              <div class="mb-6">
               <label for="password" class="block text-grey-darker text-sm font-bold mb-2">{{ __('Password') }}</label>
                <div class="mb-5">
                  <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
               <div class = "mb-5">
            <div class="checkbox">
              <label>
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
              </label>
            </div>           
          </div>
           <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
              {{ __('Login') }}
          </button>
          <br><br>
          @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
          @endif
          <br><br>
          <a class="btn btn-link" href="/register">
              {{ __('Dont have an account? Register') }}
          </a>
        </form>
    </div>
</div>


    

                           

                        
@endsection
