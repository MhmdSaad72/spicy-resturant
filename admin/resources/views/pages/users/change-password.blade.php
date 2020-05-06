@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#121618">
@endsection
@section('content')
  <!-- Personal information-->
  <section class="py-5">
    <div class="container px-lg-0">
      <header class="mb-5 jumbotron">
        <p class="text-uppercase text-primary font-weight-bold mb-0 small">Change password</p>
        <h2 class="mb-0">Change password</h2>
      </header>
      <div class="row">
        <div class="col-lg-3 mb-5">
          @include('includes.user-sidebar' , ['userPass'=>true])
        </div>
        <div class="col-lg-9 pl-lg-4">
          <form class="admin-edit-info-form needs-validation" action="{{route('update.password' , ['id' => $user->id])}}" method="post">
            {{csrf_field()}}
            {{method_field('Patch')}}
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="label-required m-0" for="oldPass">Old password</label>
                  <input class="form-control form-control-lg" type="password" id="oldPass" name="oldPass" placeholder="Enter your old password" >
                  @error('oldPass')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
                  @if(session('error'))
                    <div class="invalid-feedback d-block">{{ session('error') }}</div>
                  @endif
                </div>
                <div class="form-group ">
                  <label class="label-required" for="password">New Password</label>
                  <input class="form-control form-control-lg" id="password" type="password" name="password" placeholder="Enter your password" value="{{old('password')}}">
                  @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror

                </div>
                <div class="form-group ">
                  <label class="label-required" for="passwordConfirm">Confirm Password</label>
                  <input class="form-control form-control-lg" id="passwordConfirm" type="password" name="password_confirmation" placeholder="Retype your password" value="{{old('password_confirmation')}}">
                  {{-- @error('password_confirmation')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror --}}
                </div>
                <div class="form-group pt-2">
                  <button class="btn btn-primary" type="submit">Save changes </button>
                </div>
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
@endsection
