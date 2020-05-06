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
        <p class="text-uppercase text-primary font-weight-bold small mb-0">Bookings</p>
        <h2 class="mb-0">My bookings</h2>
      </header>
      <div class="row">
        <div class="col-xl-3 mb-5 sticky-top">
          @include('includes.user-sidebar' , ['reserve'=>true])
        </div>
        <div class="col-xl-9 pl-lg-4">





          @forelse ($user->userBookings() as  $booking)
            <!-- Booking item-->
            <div class="admin-booking-item">
            <div class="p-4 bg-dark">
              <div class="row align-items-center">
                <div class="col-md-3 py-2 py-md-0">
                  <div class="d-flex"><i class="fas fa-calendar-check mt-1 text-primary"></i>
                    <div class="ml-2">
                      <p class="h5 mb-0">{{ isset($booking->date) ? \Carbon\Carbon::parse($booking->date)->format('l') : '' }}</p>
                      <p class="text-muted small font-weight-normal mb-0">{{ isset($booking->date) ? \Carbon\Carbon::parse($booking->date)->format('d M Y') : '' }} | {{ isset($booking->time) ? \Carbon\Carbon::parse($booking->time)->format('h:i A') : '' }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 py-2 py-md-0">
                  <div class="d-flex justify-content-md-center"><i class="mt-1 fas fa-fw fa-user-friends"></i>
                    <div class="ml-3">
                      <p class="text-gray font-weight-normal text-small mb-0">{{ $booking->peopleNumber ?? '' }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 py-2 py-md-0">
                  <div class="d-flex justify-content-md-center"><i class="mt-1 fas fa-fw fa-chair"></i>
                    <div class="ml-3">
                      <p class="text-gray font-weight-normal text-small mb-0">{{ $booking->tablesNumber ?? '' }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 py-2 py-md-0">
                  <div class="d-flex justify-content-md-center"><i class="mt-1 fas fa-fw fa-smoking"></i>
                    <div class="ml-3">
                      <p class="text-small text-gray font-weight-normal mb-0">{{ $booking->smokingArea ?? '' }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="admin-booking-special-request px-4 py-3 d-flex"><i class="mt-1 fas fa-fw fa-marker"></i>
              <div class="ml-3">
                <p class="text-small text-gray font-weight-normal mb-0">{{ $booking->specialrequest ?? 'No special request' }}</p>
              </div>
            </div>
            <ul class="list-inline mb-0 d-flex admin-booking-cta">
              <li class="list-inline-item w-50 m-0"><a class="btn btn-success btn-block btn-sm" href="{{ route('booking.edit' , ['id' => $booking->id]) }}">Edit booking</a></li>
              <li class="list-inline-item w-50 m-0"><a class="btn btn-danger btn-block btn-sm" href="{{ route('booking.cancel' , ['id' => $booking->id]) }}">Cancel booking</a></li>
            </ul>
          </div>
          @empty

          <header class="bg-heading-text mb-4" data-text="Bookings">
            <div class="index-forward">
              <p class="text-uppercase text-primary font-weight-bold small mb-2">Active bookings</p>
              <h2 class="mb-4">You have no bookings yet</h2>
              <a href="{{route('booking.index')}}" class="btn btn-primary">Book a table</a>
            </div>
          </header>


          @endforelse

        </div>
      </div>
    </div>
  </section>
@endsection
