@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#0f1214">
@endsection
@section('content')
  <?php $heroDark = true ;
        $contact = true ?>
  <!-- Hero Section -->
  <section class="hero-sm bg-pattern bg-dark">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-7 mx-auto">
          <p class="text-uppercase text-primary font-weight-bold mb-3">{{$contacts->title ?? ''}}</p>
          <h1>{{$contacts->description ?? ''}}</h1>
          <p class="text-muted">{{$contacts->content ?? ''}}</p><a class="btn btn-primary transition-link" href="{{route('booking.index')}}">Book a table</a>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact section-->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="branch-img-holder bg-center bg-cover" style="background: url({{ isset($contacts->image) ? asset('storage/' . $contacts->image) : ''}})">
            <div class="branch-info px-4 py-3 text-white">
              <h5 class="mb-0">{{$contacts->place ?? ''}}</h5>
              <p class="mb-0"><a class="reset-anchor text-white small mb-0" href="{{$contacts->map_directions ?? ''}}"><i class="fas fa-globe-africa mr-2"></i>{{$contacts->address ?? ''}}</a></p>
            </div>
          </div>
          <div class="contact-map" id="map"></div>
        </div>
        <div class="col-lg-6">
          <div class="py-4 px-4 p-md-5 bg-dark demo-rounded">
            <!-- Section heading-->
            <header class="bg-heading-text" data-text="">
              <div class="index-forward">
                <p class="text-uppercase text-primary font-weight-bold small mb-2">{{$contacts->form_title ?? ''}}</p>
                <h2>{{$contacts->form_description ?? ''}}</h2>
              </div>
            </header>
            <p class="text-muted text-small">{{$contacts->form_content ?? ''}}</p>
            <ul class="list-inline mb-5">
              <li class="list-inline-item mr-1"><a class="social-link bg-primary text-white" href="{{$contacts->facebook ?? ''}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
              <li class="list-inline-item mr-1"><a class="social-link bg-primary text-white" href="{{$contacts->twitter ?? ''}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
              <li class="list-inline-item mr-1"><a class="social-link bg-primary text-white" href="{{$contacts->instagram ?? ''}}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
              <li class="list-inline-item mr-1"><a class="social-link bg-primary text-white" href="{{$contacts->youtube ?? ''}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
            </ul>
            <form class="contact-form needs-validation" action="{{route('contact.store')}}"  method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="label-required" for="fullName">Your name</label>
                <input class="form-control form-control-lg bg-none border-gray" id="fullName" type="text" name="fullName" placeholder="Enter your name" value="{{old('fullName')}}">
                {!! $errors->first('fullName' , '<div class="invalid-feedback d-block">:message</div>') !!}
              </div>
              <div class="form-group">
                <label class="label-required" for="email">Email address </label>
                <input class="form-control form-control-lg bg-none border-gray" id="email" type="text" name="email" placeholder="Enter your email address" value="{{old('email')}}">
                {!! $errors->first('email' , '<div class="invalid-feedback d-block">:message</div>') !!}
              </div>
              <div class="form-group">
                <label class="label-required mb-0" for="message">Your message</label>
                <textarea class="form-control form-control-lg bg-none border-gray py-3" id="message" name="message" rows="5" placeholder="Leave your message..." >{{old('message')}}</textarea>
                {!! $errors->first('message' , '<div class="invalid-feedback d-block">:message</div>') !!}
              </div>
              <div class="form-group pt-2 mb-0">
                <button class="btn btn-primary" type="submit">Send message</button>
              </div>
            </form>
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
