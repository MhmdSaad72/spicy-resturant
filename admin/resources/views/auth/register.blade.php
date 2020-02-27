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
      <header class="bg-heading-text mb-5" data-text="Register">
        <div class="index-forward">
          <p class="text-uppercase text-primary font-weight-bold small mb-2">Register</p>
          <h1>Create account</h1>
        </div>
      </header>
      <div class="row">
        <div class="col-lg-10">
          <form class="login-form needs-validation" action="{{ route('register') }}" method="post">
            @csrf
            <div class="row">
              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="fullName">Full Name</label>
                <input class="form-control form-control-lg" type="text" id="fullName" name="name" placeholder="Full name e.g. Jason Doe" >
                @error('name')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="fullName">Email Address</label>
                <input class="form-control form-control-lg" type="email" id="email" name="email" placeholder="Emaill address e.g. Jason@example.com" >
                @error('email')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="phone">Phone Number</label>
                <input class="form-control form-control-lg" type="tel" id="phone" name="phone" placeholder="e.g. 654856974" >
                @error('phone')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="country">Country</label>
                <select class="selectpicker" id="country" name="country" data-style="bs-select-form-control" data-title="Select your country" ></select>
              </div>
              <div class="form-group col-lg-6">
                <label class="label-required" for="password">Password</label>
                <input class="form-control form-control-lg" id="password" type="password" name="password" placeholder="Enter your password" >
                @error('password')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-lg-6">
                <label class="label-required" for="passwordConfirm">Confirm Password</label>
                <input class="form-control form-control-lg" id="passwordConfirm" type="password" name="password_confirmation" placeholder="Retype your password" >
                {{-- @error('password_confirmation')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror --}}
              </div>
              <div class="form-group col-lg-12 pt-2">
                <button class="btn btn-primary" type="submit">Create your account</button>
              </div>
              <div class="form-group col-lg-12">
                <p class="text-muted text-small d-flex align-items-center flex-wrap"><span>Already registerd?</span><a class="btn btn-link transition-link px-2 btn-sm" href="{{route('login')}}">Login now</a></p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
