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
          @guest
            <div class="alert bg-dark alert-dismissible fade show text-muted" role="alert"><strong>Note:</strong><span class="mr-1"> We recommend to login before submit a booking, it'll be easier to track your bookings </span><a class="btn btn-link transition-link p-0" href="{{route('login')}}">Login now!</a>
              <button class="close text-muted" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times-circle"></i></span></button>
            </div>
          @endguest
          <form class="booking-form needs-validation" action="{{route('booking.store')}}" method="post">
            {{ csrf_field() }}
            <div class="row">
              @guest
                <div class="form-group col-lg-6">
                    <label class="label-required m-0" for="fullName">Full Name</label>
                    <input class="form-control form-control-lg" type="text" id="fullName" name="fullname" placeholder="Full name e.g. Jason Doe" value="{{old('fullname')}}">
                    @if ($errors->has('fullname'))
                      <div class="invalid-feedback d-block">{!! $errors->first('fullname', ':message') !!}</div>
                    @endif
                </div>

                <div class="form-group col-lg-6">
                    <label class="label-required m-0" for="email">Email Address</label>
                    <input class="form-control form-control-lg" type="email" id="email" name="email" placeholder="Emaill address e.g. Jason@example.com"  value="{{old('email')}}">
                    @if ($errors->has('email'))
                      <div class="invalid-feedback d-block">{!! $errors->first('email', ':message') !!}</div>
                    @endif
                </div>
              @endguest

              <div class="form-group col-lg-6 ">
                <label class="label-required m-0" for="phone">Phone Number</label>
                <input class="form-control form-control-lg" type="tel" id="phone" name="phone" placeholder="e.g. 654856974" value="{{old('phone')}}">
                @if ($errors->has('phone'))
                  <div class="invalid-feedback d-block">{!! $errors->first('phone', ':message') !!}</div>
                @endif
              </div>

              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="smokingArea">Smoking area</label>
                <select class="selectpicker" id="smokingArea" name="smokingArea" data-style="bs-select-form-control" data-title="Select smoking area" >
                  <option value="0" {{0 == old('smokingArea')  ? 'selected' : ''}}>Smoking area</option>
                  <option value="1" {{1 == old('smokingArea') ? 'selected' : ''}}>Non-smoking area</option>
                </select>
                @if ($errors->has('smokingArea'))
                  <div class="invalid-feedback d-block">{!! $errors->first('smokingArea', ':message') !!}</div>
                @endif
              </div>

              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="peopleNumber">How many people</label>
                <input class="form-control form-control-lg" type="number" id="peopleNumber" name="peopleNumber" placeholder="How many people will come"  value="{{old('peopleNumber')}}">
                @if ($errors->has('peopleNumber'))
                  <div class="invalid-feedback d-block">{!! $errors->first('peopleNumber', ':message') !!} </div>
                @endif
                @if (session('peopleError'))
                  <div class="invalid-feedback d-block">{{ session('peopleError') }}</div>
                @endif
              </div>

              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="tablesNumber">How many tables</label>
                <input class="form-control form-control-lg" type="number" id="tablesNumber" name="tablesNumber" placeholder="How many tables needed"  value="{{old('tablesNumber')}}">
                @if ($errors->has('tablesNumber'))
                  <div class="invalid-feedback d-block">{!! $errors->first('tablesNumber', ':message') !!}</div>
                @endif

              </div>

              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="date">Desired Date</label>
                <input class="form-control form-control-lg" type="text" id="date" name="date" placeholder="Pick your desired date" autocomplete="off" value="{{old('date')}}">
                @if ($errors->has('date'))
                  <div class="invalid-feedback d-block">{!! $errors->first('date', ':message') !!}</div>
                @endif
                @if (session('dateError'))
                  <div class="invalid-feedback d-block">{{ session('dateError') }}</div>
                @endif
              </div>

              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="time">Desired Time</label>
                <input class="form-control form-control-lg" type="tel" id="time" name="time" placeholder="Pick your desired time" value="{{old('time')}}">
                @if ($errors->has('time'))
                  <div class="invalid-feedback d-block">{!! $errors->first('time', ':message') !!}</div>
                @endif
                @if (session('timeError'))
                  <div class="invalid-feedback d-block">{{session('timeError')}}</div>
                @endif
              </div>

              <div class="form-group col-lg-12">
                <label class="label-optional m-0" for="specialRequest">Spcial Request</label>
                <textarea class="form-control form-control-lg" name="specialrequest" id="specialRequest" placeholder="If you have any extra request, let us know" rows="5" >{{old('specialrequest')}}</textarea>
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
  <section class="pb-5 mb-5">
    <!-- Opening hours section-->
    @include('includes.opening-hours')
  </section>
@endsection
@section('scripts')
  <!-- Bootstrap 4 Validation-->
  <script src="{{asset('js/validation/validation.js')}}"></script>
  <!-- Bootstrap Select Validation-->
  <script src="{{asset('js/validation/bs-select-validation.js')}}"></script>
  <script src="{{asset('js/front.js')}}"></script>
@endsection
