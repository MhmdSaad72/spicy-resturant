@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#121618">
@endsection

@section('content')
  <!-- Login section-->
  <section>
    <div class="container">
      <!-- Section heading-->
      <header class="bg-heading-text mb-5" data-text="login">
        <div class="index-forward">
          <p class="text-uppercase text-primary font-weight-bold small mb-2">Login</p>
          <h1>Login now</h1>
        </div>
      </header>
      <div class="row">
        <div class="col-lg-5">
          <form class="login-form needs-validation" action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
              <label class="label-required" for="email">Emaill address</label>
              <input class="form-control form-control-lg " id="email" type="email" name="email" placeholder="Email address e.g. Jason@mail.com" value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
              @if (session('emailError'))
                <div class="invalid-feedback kh d-block">{{ session('emailError') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label class="label-required" for="password">Password</label>
              <input class="form-control form-control-lg" id="password" type="password" name="password" placeholder="Enter your password" >
              @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group pt-2">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" id="rememberMe" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="rememberMe">Remember me for the next time</label>
              </div>
            </div>
            <div class="form-group pt-2">
              <button class="btn btn-primary" type="submit">Login now</button>
              <br>
              @if (Route::has('password.request'))
                  <a class="btn btn-link p-0 btn-sm mt-3" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
              @endif
            </div>
            <div class="form-group">
              <p class="text-muted text-small d-flex align-items-center flex-wrap"> <span>Not registerd yet?</span><a class="btn btn-link transition-link px-2 btn-sm" href="{{ route('register') }}">Create an account</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
