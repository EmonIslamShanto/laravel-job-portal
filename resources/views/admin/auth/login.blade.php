{{-- <x-guest-layout>


    <h1>Admin Login</h1>

    <form >






        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@
@extends('admin.auth.layouts.auth-master')

@section('contents')
<section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand">
            <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
          </div>

          <div class="card card-primary">
            <div class="card-header"><h4>Login</h4></div>

            <div class="card-body">
             <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
              <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                  <!-- Email -->

                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control {{ $errors-> has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" name="email" tabindex="1" required autofocus>
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->

                <div class="form-group">
                  <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    <div class="float-right">
                      <a href="{{ route('admin.password.request') }}" class="text-small">
                        Forgot Password?
                      </a>
                    </div>
                  </div>
                  <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                  <!-- Remember Me -->

                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="simple-footer">
            Copyright &copy; {{ date('Y') }} <div class="bullet"></div> Design By <a href="https://emonislamshanto.github.io/developer-portfolio/">Emon Islam Shanto</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
