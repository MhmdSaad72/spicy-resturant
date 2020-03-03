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
          {{-- <p class="text-uppercase text-primary font-weight-bold small mb-2">Login</p> --}}
          <h1>{{ __('Reset Password') }}</h1>
        </div>
      </header>
      <div class="row">
        <div class="col-lg-5">
          <form class="login-form needs-validation" action="{{ route('password.email') }}" method="post">
            @csrf
            <div class="form-group">
              <label class="label-required" for="email">Emaill address</label>
              <input class="form-control form-control-lg " id="email" type="email" name="email" placeholder="Email address e.g. Jason@mail.com" value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group pt-2">
              <button class="btn btn-primary" type="submit">{{ __('Send Password Reset Link') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
