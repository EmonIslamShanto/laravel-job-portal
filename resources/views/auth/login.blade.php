@extends('front-end.layouts.master')

@section('contents')
<section class="section-box mt-75">
    <div class="breacrumb-cover">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-12">
            <h2 class="mb-20">Login</h2>
            <ul class="breadcrumbs">
              <li><a class="home-icon" href="index.html">Home</a></li>
              <li>Login</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="pt-120 pb-100 login-register">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-12 mx-auto">
          <div class="login-register-cover">
             <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="text-center">
              <h2 class="mb-5 text-brand-1">Login</h2>
              <p class="font-sm text-muted mb-30">Please enter your valid credentials</p>
            </div>
            <form class="login-register text-start mt-20" method="POST" action="{{ route('login') }}">
            @csrf

              <div class="row">

                 <!-- Email Address -->
                <div class="col-xl-12">
                  <div class="form-group">
                    <label class="form-label" for="input-3">Email</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="input-3" type="email" required="" name="email"
                      placeholder="stevenjob" value="{{ old('email') }}">

                      <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>
                </div>

                <!-- Password -->
                <div class="col-xl-12">
                  <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="input-4">Password *</label>
                        <a href="{{ route('password.request') }}">Forgot Password</a>
                    </div>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="input-4" type="password" required="" name="password"
                      placeholder="************">

                      <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>
                </div>

                <div class="col-xl-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input {{ $errors->has('remember_me') ? 'is-invalid' : '' }}" type="checkbox" name="remember_me" id="remember_me" value="remember_me">
                        <label class="form-check-label" for="typeCandidate">Remember me</label>
                      </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-default hover-up w-100" type="submit" name="login">Login</button>
                </div>

                <div class="text-muted text-center">Don't have an account?
                    <a href="{{ route('register') }}">Registration</a>
                </div>
                </div>
            </form>
            {{-- <div class="text-center mt-20">
              <div class="divider-text-center"><span>Or continue with</span></div>
              <button class="btn social-login hover-up mt-20"><img src="assets/imgs/template/icons/icon-google.svg"
                  alt="joblist"><strong>Sign up with Google</strong></button>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
