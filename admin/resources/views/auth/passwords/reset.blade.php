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
          <p class="text-uppercase text-primary font-weight-bold small mb-2">{{ __('Reset Password') }}</p>
          <h1>{{ __('Reset Password') }}</h1>
        </div>
      </header>
      <div class="row">
        <div class="col-lg-5">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <div class="row">
                    <div class="form-group col-lg-12">
                      <label class="label-required m-0" for="email">Email Address</label>
                      <input class="form-control form-control-lg" type="email" id="email" name="email" placeholder="Emaill address e.g. Jason@example.com" value="{{old('email')}}">
                      @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group col-lg-12">
                      <label class="label-required" for="password">Password</label>
                      <input class="form-control form-control-lg" id="password" type="password" name="password" placeholder="Enter your password" value="{{old('password')}}">
                      @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group col-lg-12">
                      <label class="label-required" for="passwordConfirm">Confirm Password</label>
                      <input class="form-control form-control-lg" id="passwordConfirm" type="password" name="password_confirmation" placeholder="Retype your password" value="{{old('password_confirmation')}}">
                    </div>
                    <div class="form-group col-lg-12 pt-2">
                      <button class="btn btn-primary" type="submit">{{ __('Reset Password') }}</button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
  </section>
@endsection
@section('scripts')
  <!-- Bootstrap 4 Validation-->
  <script src="{{asset('js/validation/validation.js')}}"></script>
  <!-- Bootstrap Select Validation-->
  <script src="{{asset('js/validation/bs-select-validation.js')}}"></script>
  <script src="{{asset('js/front.js')}}"></script>
@endsection
