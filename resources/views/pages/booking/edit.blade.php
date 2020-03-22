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
          <p class="text-uppercase text-primary font-weight-bold small mb-2">Edit Reservation</p>
          <h1>Book your table</h1>
        </div>
      </header>
      <div class="pt-lg-5">
        <div class="booking-form-holder shadow py-5 px-4 px-md-5 shadow">
          <form class="booking-form needs-validation" action="{{route('booking.update' , ['id' =>$booking->id])}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="row">
              <div class="form-group col-lg-6 ">
                <label class="label-required m-0" for="phone">Phone Number</label>
                <input class="form-control form-control-lg" type="tel" id="phone" name="phone" placeholder="e.g. 654856974" value="{{ $booking->phone ?? '' }}">
                @if ($errors->has('phone'))
                  <div class="invalid-feedback d-block">{!! $errors->first('phone', ':message') !!}</div>
                @endif
              </div>

              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="smokingArea">Smoking area</label>
                <select class="selectpicker" id="smokingArea" name="smokingArea" data-style="bs-select-form-control" data-title="Select smoking area" >
                  <option value="0" {{ $booking->smokingArea == 0 ? 'selected' : ''}}>Smoking area</option>
                  <option value="1" {{ $booking->smokingArea == 1 ? 'selected' : ''}}>Non-smoking area</option>
                </select>
                @if ($errors->has('smokingArea'))
                  <div class="invalid-feedback d-block">{!! $errors->first('smokingArea', ':message') !!}</div>
                @endif
              </div>

              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="peopleNumber">How many people</label>
                <input class="form-control form-control-lg" type="number" id="peopleNumber" name="peopleNumber" placeholder="How many people will come"  value="{{ $booking->peopleNumber ?? '' }}">
                @if ($errors->has('peopleNumber'))
                  <div class="invalid-feedback d-block">{!! $errors->first('peopleNumber', ':message') !!} </div>
                @endif
                @if (session('peopleError'))
                  <div class="invalid-feedback d-block">{{ session('peopleError') }}</div>
                @endif
              </div>

              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="tablesNumber">How many tables</label>
                <input class="form-control form-control-lg" type="number" id="tablesNumber" name="tablesNumber" placeholder="How many tables needed"  value="{{ $booking->tablesNumber ?? '' }}">
                @if ($errors->has('tablesNumber'))
                  <div class="invalid-feedback d-block">{!! $errors->first('tablesNumber', ':message') !!}</div>
                @endif
              </div>

              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="date">Desired Date</label>
                <input class="form-control form-control-lg" type="text" id="date" name="date" placeholder="Pick your desired date" autocomplete="off" value="{{ $booking->date ?? '' }}">
                @if ($errors->has('date'))
                  <div class="invalid-feedback d-block">{!! $errors->first('date', ':message') !!}</div>
                @endif
                @if (session('dateError'))
                  <div class="invalid-feedback d-block">{{ session('dateError') }}</div>
                @endif
              </div>

              <div class="form-group col-lg-6">
                <label class="label-required m-0" for="time">Desired Time</label>
                <input class="form-control form-control-lg" type="tel" id="time" name="time" placeholder="Pick your desired time" value="{{ $booking->time ?? '' }}">
                @if ($errors->has('time'))
                  <div class="invalid-feedback d-block">{!! $errors->first('time', ':message') !!}</div>
                @endif
                @if (session('timeError'))
                  <div class="invalid-feedback d-block">{{session('timeError')}}</div>
                @endif
              </div>

              <div class="form-group col-lg-12">
                <label class="label-optional m-0" for="specialRequest">Spcial Request</label>
                <textarea class="form-control form-control-lg" name="specialrequest" id="specialRequest" placeholder="If you have any extra request, let us know" rows="5" >{{ $booking->specialrequest ?? '' }}</textarea>
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
  <script src="{{asset('js/front.js')}}"></script>
@endsection
