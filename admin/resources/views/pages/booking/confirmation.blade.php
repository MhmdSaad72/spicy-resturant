@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#121618">
@endsection
@section('content')
  <!-- Confirmation section-->
  <section class="text-center">
    <div class="container">
      <div class="row mb-4 pb-3">
        <div class="col-lg-10 mx-auto"><i class="fas fa-clipboard-check fa-6x text-primary mb-4"></i>
          <h1 class="h2 mb-4">Your booking has been placed</h1>
          <div class="alert bg-dark fade show" role="alert"><strong>Note:</strong><span class="mr-2"> Your booking ID is <span class="text-underline">{{ isset($booking) ? $booking->booking_id : ''}}</span>, you can cancel your booking with this code.</span><a class="btn btn-link transition-link p-0" href="{{route('booking.cancel')}}">Cancel Booking</a></div>
          <p class="text-muted">Dear <span class="text-light">{{ isset($booking) ? $booking->fullname : ''}}</span>, we've just received a booking from you with the following Information:</p>
        </div>
      </div>
      <div class="row text-left">
        <div class="col-lg-5 mx-auto">
          <div class="booking-receipt p-4 p-lg-5 bg-dark">
            <ul class="list-unstyled mb-0">
              <li class="d-flex align-items-center border-bottom border-base mb-3 pb-3"><i class="fas fa-calendar-check fa-2x text-primary"></i>
                <div class="ml-3">
                  <p class="h6 mb-0">{{ isset($booking) ? $booking->date : ''}}</p>
                  <p class="text-muted text-small font-weight-normal mb-0">{{ isset($booking) ? $booking->time : ''}}</p>
                </div>
              </li>
              <li class="d-flex align-items-center border-bottom border-base mb-3 pb-3"><i class="fas fa-fw fa-user-friends"></i>
                <div class="ml-3">
                  <p class="text-gray font-weight-normal text-small mb-0">{{ isset($booking) ? $booking->peopleNumber : ''}}</p>
                </div>
              </li>
              <li class="d-flex align-items-center border-bottom border-base mb-3 pb-3"><i class="fas fa-fw fa-chair"></i>
                <div class="ml-3">
                  <p class="text-gray font-weight-normal text-small mb-0">{{ isset($booking) ? $booking->tablesNumber : ''}}</p>
                </div>
              </li>
              <li class="d-flex align-items-center border-bottom border-base mb-3 pb-3"><i class="fas fa-fw fa-smoking"></i>
                <div class="ml-3">
                  <p class="text-small text-gray font-weight-normal mb-0">{{ isset($booking) ? $booking->smokingArea : ''}}</p>
                </div>
              </li>
              <li class="d-flex align-items-center"><i class="fas fa-fw fa-marker"></i>
                <div class="ml-3">
                  @isset($booking->specialrequest)
                    <p class="text-small text-gray font-weight-normal mb-0">{{$booking->specialrequest}}</p>
                  @else
                    <p class="text-small text-gray font-weight-normal mb-0">No special requests</p>
                  @endisset
                </div>
              </li>
            </ul>
          </div>
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
