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
          <div class="admin-nav nav flex-column nav-pills" aria-orientation="vertical"><a class="nav-link transition-link" href="admin-personal.html"> <i class="fas fa-user-circle mr-2"></i>Personal Information</a><a class="nav-link transition-link" href="admin-edit-personal.html"> <i class="fas fa-user-edit mr-2"></i>Edit my Information</a><a class="nav-link active" href="#"> <i class="fas fa-calendar-minus mr-2"></i>My Bookings</a><a class="nav-link transition-link" href="admin-reviews.html"> <i class="fas fa-star mr-2"></i>My Reviews</a><a class="nav-link transition-link" href="admin-pass-change.html"> <i class="fas fa-lock mr-2"></i>Change my Password</a></div>
        </div>
        <div class="col-xl-9 pl-lg-4">
          <!-- Booking item-->
          <div class="admin-booking-item">
            <div class="p-4 bg-dark">
              <div class="row align-items-center">
                <div class="col-md-3 py-2 py-md-0">
                  <div class="d-flex"><i class="fas fa-calendar-check mt-1 text-primary"></i>
                    <div class="ml-2">
                      <p class="h5 mb-0">Monday</p>
                      <p class="text-muted small font-weight-normal mb-0">03 Mar 2020 | 07:00 PM</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 py-2 py-md-0">
                  <div class="d-flex justify-content-md-center"><i class="fas fa-fw fa-user-friends"></i>
                    <div class="ml-3">
                      <p class="text-gray font-weight-normal text-small mb-0">4 People</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 py-2 py-md-0">
                  <div class="d-flex justify-content-md-center"><i class="fas fa-fw fa-chair"></i>
                    <div class="ml-3">
                      <p class="text-gray font-weight-normal text-small mb-0">2 Tables</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 py-2 py-md-0">
                  <div class="d-flex justify-content-md-center"><i class="fas fa-fw fa-smoking"></i>
                    <div class="ml-3">
                      <p class="text-small text-gray font-weight-normal mb-0">Smoking area</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="admin-booking-special-request px-4 py-3 d-flex"><i class="fas fa-fw fa-marker"></i>
              <div class="ml-3">
                <p class="text-small text-gray font-weight-normal mb-0">No special requests</p>
              </div>
            </div>
            <ul class="list-inline mb-0 d-flex admin-booking-cta">
              <li class="list-inline-item w-50 m-0"><a class="btn btn-success btn-block btn-sm" href="booking.html">Edit booking</a></li>
              <li class="list-inline-item w-50 m-0"><a class="btn btn-danger btn-block btn-sm" href="booking-cancellation.html">Cancel booking</a></li>
            </ul>
          </div>
          <!-- Booking item-->
          <div class="admin-booking-item">
            <div class="p-4 bg-dark">
              <div class="row align-items-center">
                <div class="col-md-3 py-2 py-md-0">
                  <div class="d-flex"><i class="fas fa-calendar-check mt-1 text-primary"></i>
                    <div class="ml-2">
                      <p class="h5 mb-0">Friday</p>
                      <p class="text-muted small font-weight-normal mb-0">03 Jan 2020 | 07:00 PM</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 py-2 py-md-0">
                  <div class="d-flex justify-content-md-center"><i class="fas fa-fw fa-user-friends"></i>
                    <div class="ml-3">
                      <p class="text-gray font-weight-normal text-small mb-0">3 People</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 py-2 py-md-0">
                  <div class="d-flex justify-content-md-center"><i class="fas fa-fw fa-chair"></i>
                    <div class="ml-3">
                      <p class="text-gray font-weight-normal text-small mb-0">1 Table</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 py-2 py-md-0">
                  <div class="d-flex justify-content-md-center"><i class="fas fa-fw fa-smoking"></i>
                    <div class="ml-3">
                      <p class="text-small text-gray font-weight-normal mb-0">Non-smoking area</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="admin-booking-special-request px-4 py-3 d-flex"><i class="fas fa-fw fa-marker"></i>
              <div class="ml-3">
                <p class="text-small text-gray font-weight-normal mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
              </div>
            </div>
            <ul class="list-inline mb-0 d-flex admin-booking-cta">
              <li class="list-inline-item w-50 m-0"><a class="btn btn-success btn-block btn-sm" href="booking.html">Edit booking</a></li>
              <li class="list-inline-item w-50 m-0"><a class="btn btn-danger btn-block btn-sm" href="booking-cancellation.html">Cancel booking</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
