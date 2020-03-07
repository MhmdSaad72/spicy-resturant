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
          <div class="admin-nav nav flex-column nav-pills" aria-orientation="vertical">
            <a class="nav-link transition-link" href="{{route('personal.information' , ['id' => $user->id])}}"> <i class="fas fa-user-circle mr-2"></i>Personal Information</a>
            <a class="nav-link transiton-link" href="{{route('edit.information' , ['id' => $user->id])}}"> <i class="fas fa-user-edit mr-2"></i>Edit my Information</a>
            <a class="nav-link transition-link" href="{{route('booking.bookings')}}"> <i class="fas fa-calendar-minus mr-2"></i>My Bookings</a>
            <a class="nav-link transition-link" href="{{route('personal.review' , ['id' => $user->id])}}"> <i class="fas fa-star mr-2"></i>My Reviews</a>
            <a class="nav-link active" href="{{route('change.password' , ['id' => $user->id])}}"> <i class="fas fa-lock mr-2"></i>Change my Password</a>
          </div>
        </div>
        <div class="col-lg-9 pl-lg-4">
          <form class="admin-edit-info-form needs-validation" action="admin-personal.html" >
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="label-required m-0" for="oldPass">Old password</label>
                  <input class="form-control form-control-lg" type="password" id="oldPass" name="oldPass" placeholder="Enter your old password" required>
                  <div class="invalid-feedback">This password is incorrect</div>
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="form-group">
                  <label class="label-required m-0" for="newPass">New password</label>
                  <input class="form-control form-control-lg" type="password" id="newPass" name="newPass" placeholder="Type your new password" required>
                  <div class="invalid-feedback">Please fill this field</div>
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="form-group">
                  <label class="label-required m-0" for="newPassConfirmation">Confirm new password</label>
                  <input class="form-control form-control-lg" type="password" id="newPassConfirmation" name="newPassConfirmation" placeholder="Retype your new password" required>
                  <div class="invalid-feedback">Please enter your phone number</div>
                  <div class="valid-feedback">Looks good!</div>
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
