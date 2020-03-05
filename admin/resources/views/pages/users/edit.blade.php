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
        <p class="text-uppercase text-primary font-weight-bold mb-0 small">Edit info</p>
        <h2 class="mb-0">Edit my info</h2>
      </header>
      <div class="row">
        <div class="col-lg-3 mb-5">
          <div class="admin-nav nav flex-column nav-pills" aria-orientation="vertical">
            <a class="nav-link transition-link" href="{{route('personal.information' , ['id' => $user->id])}}"> <i class="fas fa-user-circle mr-2"></i>Personal Information</a>
            <a class="nav-link active" href="{{route('edit.information' , ['id' => $user->id])}}"> <i class="fas fa-user-edit mr-2"></i>Edit my Information</a>
            <a class="nav-link transition-link" href="{{route('booking.bookings')}}"> <i class="fas fa-calendar-minus mr-2"></i>My Bookings</a>
            <a class="nav-link transition-link" href="admin-reviews.html"> <i class="fas fa-star mr-2"></i>My Reviews</a>
            <a class="nav-link transition-link" href="{{route('change.password' , ['id' => $user->id])}}"> <i class="fas fa-lock mr-2"></i>Change my Password</a></div>
        </div>
        <div class="col-lg-9 pl-lg-4">
          <form class="admin-edit-info-form needs-validation" action="{{route('update.information' , ['id' => $user->id])}}" method="post">
            {{ method_field('PATCH') }}
            {{csrf_field()}}
            <div class="row">
              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="fullName">Full Name</label>
                <input class="form-control form-control-lg" type="text" id="fullName" name="name" placeholder="Full name e.g. Jason Doe" value="{{$user->name ?? ''}}" >
                @error('name')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="email">Email Address</label>
                <input class="form-control form-control-lg" type="email" id="email" name="email" placeholder="Emaill address e.g. Jason@example.com" value="{{$user->email ?? ''}}" >
                @error('email')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="phone">Phone Number</label>
                <input class="form-control form-control-lg" type="tel" id="phone" name="phone" placeholder="e.g. 654856974" value="{{$user->phone ?? ''}}" >
                @error('phone')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="country">Country</label>
                <select class="selectpicker" id="country" name="country" data-style="bs-select-form-control" data-title="Select your country" value="England" >
                </select>
                @error('country')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-lg-12 pt-2">
                <button class="btn btn-primary" type="submit">Save changes </button>
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
