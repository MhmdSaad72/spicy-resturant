@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#121618">
@endsection
@section('content')
  <!-- Booking section-->
  <section>
    <div class="container">
      <!-- Section heading-->
      <header class="bg-heading-text text-center mb-5" data-text="Reservation">
        <div class="index-forward">
          <p class="text-uppercase text-primary font-weight-bold small mb-2">Reserve a seat</p>
          <h1>Book your table</h1>
        </div>
      </header>
      <div class="pt-lg-5">
        <div class="booking-form-holder shadow py-5 px-4 px-md-5 shadow">
          <div class="alert bg-dark alert-dismissible fade show text-muted" role="alert"><strong>Note:</strong><span class="mr-1"> We recommend to login before submit a booking, it'll be easier to track your bookings </span><a class="btn btn-link transition-link p-0" href="login.html">Login now!</a>
            <button class="close text-muted" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times-circle"></i></span></button>
          </div>
          <form class="booking-form needs-validation" action="{{route('booking.store')}}" method="post">
            {{ csrf_field() }}
            <div class="row">
              <div class="form-group col-lg-6 {{ $errors->has('fullName') ? 'has-error' : ''}}">
                <label class="label-required m-0" for="fullName">Full Name</label>
                <input class="form-control form-control-lg" type="text" id="fullName" name="fullname" placeholder="Full name e.g. Jason Doe" >
                <div class="invalid-feedback">{!! $errors->first('fullName', ':message') !!}</div>
                <div class="valid-feedback">Looks good!</div>
              </div>
              <div class="form-group col-lg-6 {{ $errors->has('email') ? 'has-error' : ''}}">
                <label class="label-required m-0" for="email">Email Address</label>
                <input class="form-control form-control-lg" type="email" id="email" name="email" placeholder="Emaill address e.g. Jason@example.com" >
                <div class="invalid-feedback">{!! $errors->first('email', ':message') !!}</div>
                <div class="valid-feedback">Looks good!</div>
              </div>
              <div class="form-group col-lg-6 {{ $errors->has('phone') ? 'has-error' : ''}}">
                <label class="label-required m-0" for="phone">Phone Number</label>
                <input class="form-control form-control-lg" type="tel" id="phone" name="phone" placeholder="e.g. 654856974" >
                <div class="invalid-feedback">{!! $errors->first('phone', ':message') !!}</div>
                <div class="valid-feedback">Looks good!</div>
              </div>
              <div class="form-group col-lg-6 {{ $errors->has('smokingArea') ? 'has-error' : ''}}">
                <label class="label-required m-0" for="smokingArea">Smoking area</label>
                <select class="selectpicker" id="smokingArea" name="smokingArea" data-style="bs-select-form-control" data-title="Select smoking area" >
                  <option value="0">Smoking area</option>
                  <option value="1">Non-smoking area</option>
                </select>
              </div>
              <div class="form-group col-lg-6 {{ $errors->has('peopleNumber') ? 'has-error' : ''}}">
                <label class="label-required m-0" for="peopleNumber">How many people</label>
                <input class="form-control form-control-lg" type="number" id="peopleNumber" name="peopleNumber" placeholder="How many people will come" min="1" max="18" >
                <div class="invalid-feedback">{!! $errors->first('peopleNumber', ':message') !!} </div>
                <div class="valid-feedback">Looks good!</div>
              </div>
              <div class="form-group col-lg-6 {{ $errors->has('tablesNumber') ? 'has-error' : ''}}">
                <label class="label-required m-0" for="tablesNumber">How many tables</label>
                <input class="form-control form-control-lg" type="number" id="tablesNumber" name="tablesNumber" placeholder="How many tables needed" min="1" max="5" >
                <div class="invalid-feedback">{!! $errors->first('tablesNumber', ':message') !!}</div>
                <div class="valid-feedback">Looks good!</div>
              </div>
              <div class="form-group col-lg-6 {{ $errors->has('date') ? 'has-error' : ''}}">
                <label class="label-required m-0" for="date">Desired Date</label>
                <input class="form-control form-control-lg" type="text" id="date" name="date" placeholder="Pick your desired date" autocomplete="off" >
                <div class="invalid-feedback">{!! $errors->first('date', ':message') !!}</div>
                <div class="valid-feedback">Looks good!</div>
              </div>
              <div class="form-group col-lg-6 {{ $errors->has('time') ? 'has-error' : ''}}">
                <label class="label-required m-0" for="time">Desired Time</label>
                <input class="form-control form-control-lg" type="tel" id="time" name="time" placeholder="Pick your desired time" >
                <div class="invalid-feedback">{!! $errors->first('time', ':message') !!}</div>
                <div class="valid-feedback">Looks good!</div>
              </div>
              <div class="form-group col-lg-12">
                <label class="label-optional m-0" for="specialRequest">Spcial Request</label>
                <textarea class="form-control form-control-lg" name="specialrequest" id="specialRequest" placeholder="If you have any extra request, let us know" rows="5"></textarea>
              </div>
              <div class="form-group col-lg-12">
                <button class="btn btn-primary px-5" type="submit">Book a Table</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Opening hours section-->
  @include('includes.opening-hours')
@endsection
@section('scripts')
  <!-- Bootstrap 4 Validation-->
  <script src="{{asset('js/validation/validation.js')}}"></script>
  <!-- Bootstrap Select Validation-->
  <script src="{{asset('js/validation/bs-select-validation.js')}}"></script>
@endsection
