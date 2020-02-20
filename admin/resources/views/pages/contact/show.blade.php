@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#0f1214">
@endsection
@section('content')
  <!-- Hero Section -->
  <section class="hero-sm bg-pattern bg-dark">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-7 mx-auto">
          <p class="text-uppercase text-primary font-weight-bold mb-3">{{$contacts->title ?? ''}}</p>
          <h1>{{$contacts->description ?? ''}}</h1>
          <p class="text-muted">{{$contacts->content ?? ''}}</p><a class="btn btn-primary transition-link" href="booking.html">Book a table</a>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact section-->
  <section>
    <div class="container">
      <!-- Section heading-->
      <header class="bg-heading-text mb-5" data-text="Branches">
        <div class="index-forward">
          <p class="text-uppercase text-primary font-weight-bold small mb-2">Main branch</p>
          <h2>Our main branch</h2>
        </div>
      </header>
      <div class="row align-items-stretch">
        <div class="col-lg-6 pr-lg-0">
          <div class="branch-img-holder bg-center bg-cover" style="background: url({{asset('storage/' . $contacts->image)}})"></div>
        </div>
        <div class="col-lg-6 pl-lg-0">
          <div class="contact-map h-100" id="map"></div>
        </div>
      </div>
      <div class="bg-primary text-white px-5 py-4">
        <div class="row align-items-center">
          <div class="col-lg-7 mb-3 mb-lg-0">
            <h2 class="h4 mb-2">{{$contacts->place ?? ''}}</h2>
            <p class="text-small mb-0"><i class="fas fa-globe-africa mr-2"></i>{{$contacts->address ?? ''}}</p>
          </div>
          <div class="col-lg-5 text-left text-lg-right"><a class="btn btn-outline-light" href="http://maps.google.com/maps?q=210+Louise+Ave,+Nashville,+TN+37203">Get location</a></div>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-dark">
    <div class="container">
      <!-- Section heading-->
      <header class="bg-heading-text mb-5" data-text="Branches">
        <div class="index-forward">
          <p class="text-uppercase text-primary font-weight-bold small mb-2">{{$branchHead->title ?? ''}}</p>
          <h2>{{$branchHead->description ?? ''}}</h2>
        </div>
      </header>
      <div class="row align-items-stretch">
        @foreach ($branchBodies as $key => $item)
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="p-4 p-md-5 border-top border-md border-primary shadow-sm bg-body h-100 d-flex flex-column justify-content-center demo-rounded">
              <h3 class="h4">{{$item->place}}</h3>
              <p class="mb-1 text-muted font-weight-normal text-small"><i class="small text-primary fas fa-globe-africa fa-fw mr-2"></i>{{$item->address}}</p>
              <p class="mb-1 text-muted font-weight-normal text-small"><a class="reset-anchor" href="tel:214578536"> <i class="small text-primary fas fa-phone fa-fw mr-2"></i>{{$item->phone}}</a></p>
              <p class="mb-3 text-small text-muted font-weight-normal"><a class="reset-anchor" href="mailto:brooklyn@spicy.com"> <i class="small text-primary fas fa-envelope fa-fw mr-2"></i>{{$item->email}}</a></p><a class="btn btn-dark btn-sm" href="#">Get location    </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-9 mx-auto">
          <!-- Section heading-->
          <header class="bg-heading-text text-center" data-text="Contact">
            <div class="index-forward">
              <p class="text-uppercase text-primary font-weight-bold small mb-2">{{$contacts->form_title ?? ''}}</p>
              <h2>{{$contacts->form_description ?? ''}}</h2>
            </div>
          </header>
          <p class="text-muted text-center">{{$contacts->form_description ?? ''}}</p>
          <ul class="list-inline mb-5 text-center">
            <li class="list-inline-item mr-1"><a class="social-link bg-primary text-white" href="{{$contacts->facebook ?? ''}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li class="list-inline-item mr-1"><a class="social-link bg-primary text-white" href="{{$contacts->twitter ?? ''}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item mr-1"><a class="social-link bg-primary text-white" href="{{$contacts->instagram ?? ''}}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
            <li class="list-inline-item mr-1"><a class="social-link bg-primary text-white" href="{{$contacts->youtube ?? ''}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
          </ul>
          <div class="mt-4 border-top border-md border-primary p-4 p-md-5 shadow bg-body demo-rounded">
            <form class="contact-form needs-validation" action="index.html" novalidate>
              <div class="row">
                <div class="form-group col-lg-6">
                  <label class="label-required" for="fullName">Your name</label>
                  <input class="form-control form-control-lg bg-none border-gray" id="fullName" type="text" name="fullName" placeholder="Enter your name" required>
                  <div class="invalid-feedback">Please enter your name</div>
                  <div class="valid-feedback">Looks good</div>
                </div>
                <div class="form-group col-lg-6">
                  <label class="label-required" for="email">Email address </label>
                  <input class="form-control form-control-lg bg-none border-gray" id="email" type="text" name="email" placeholder="Enter your email address" required>
                  <div class="invalid-feedback">Please enter your email address</div>
                  <div class="valid-feedback">Looks good</div>
                </div>
                <div class="form-group col-lg-12">
                  <label class="label-required mb-0" for="message">Your message</label>
                  <textarea class="form-control form-control-lg bg-none border-gray py-3" id="message" name="message" rows="5" placeholder="Leave your message..."></textarea>
                  <div class="invalid-feedback">Please enter your message</div>
                  <div class="valid-feedback">Looks good</div>
                </div>
                <div class="form-group col-lg-12 pt-2 mb-0">
                  <button class="btn btn-primary" type="submit">Send message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
