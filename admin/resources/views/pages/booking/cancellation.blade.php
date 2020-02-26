@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#121618">
@endsection
@section('content')
  <!-- Booking cancellation section-->
  <section>
    <div class="container">
      <!-- Section heading-->
      <header class="bg-heading-text text-center mb-4" data-text="Cancellation">
        <div class="index-forward">
          <p class="text-uppercase text-primary font-weight-bold small mb-2">Cancellation</p>
          <h1>Cancel your booking</h1>
        </div>
      </header>
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <p class="text-muted text-center mb-5">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.</p>
          <form class="activation-form needs-validation" action="cancelled.html" novalidate>
            <div class="form-group">
              <label class="label-required m-0" for="cancellationCode">Booking ID</label>
              <input class="form-control form-control-lg" type="text" id="cancellationCode" name="cancellationCode" placeholder="Type your booking code" required>
              <div class="invalid-feedback">We don't have any bookings with this ID</div>
              <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-block" type="submit">Cancel your booking</button>
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
