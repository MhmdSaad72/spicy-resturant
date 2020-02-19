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
          <p class="text-uppercase text-primary font-weight-bold mb-3">{{ $aboutUs->title ?? '' }}</p>
          <h1>{{ $aboutUs->description ?? '' }}</h1>
          <p class="text-muted">{{ $aboutUs->content ?? '' }}</p><a class="btn btn-primary transition-link" href="booking.html">Book a table</a>
        </div>
      </div>
    </div>
  </section>
  <!-- Philosophy section-->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- Section heading-->
          <header class="bg-heading-text text-center mb-5" data-text="Vision">
            <div class="index-forward">
              <p class="text-uppercase text-primary font-weight-bold small mb-2">Our vision</p>
              <h2>Our philosophy</h2>
            </div>
          </header>
          <blockquote class="blockquote border-0 text-center">
            <p class="drop-caps text-center text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <footer class="blockquote-footer">Sundar Pichai
              <cite>Spicy restaurant CEO</cite>
            </footer>
          </blockquote>
        </div>
      </div>
    </div>
  </section>
  <!-- Statistics section-->
  <section class="bg-dark">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0"><img class="mb-3" src="img/stats-1-default.svg" alt="..." height="40">
          <h2 class="line-height-sm">214</h2>
          <p class="small text-muted">Various dishes</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0"><img class="mb-3" src="img/stats-2-default.svg" alt="..." height="40">
          <h2 class="line-height-sm">2000</h2>
          <p class="small text-muted">Daily visitors</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0"><img class="mb-3" src="img/stats-3-default.svg" alt="..." height="40">
          <h2 class="line-height-sm">12</h2>
          <p class="small text-muted">Worldwide branches</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0"><img class="mb-3" src="img/stats-4-default.svg" alt="..." height="40">
          <h2 class="line-height-sm">100%</h2>
          <p class="small text-muted">Intime delivery</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Chefs section-->
  @include('includes.chefs')
  <!-- Gallery section-->
  @include('includes.gallary')
  <!-- Awards section-->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-5 mb-lg-0">
          <div class="accordion" id="awardsAccordion">
            <div class="card border-0 mb-2">
              <div class="card-header p-0 border-0" id="headingOne"><a class="accordion-toggle" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Our philosophy</a></div>
              <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#awardsAccordion">
                <div class="card-body bg-body">
                  <p class="text-small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</p>
                </div>
              </div>
            </div>
            <div class="card border-0 mb-2">
              <div class="card-header p-0 border-0" id="headingTwo"><a class="accordion-toggle" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Our purpose</a></div>
              <div class="collapse show" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#awardsAccordion">
                <div class="card-body bg-body">
                  <p class="text-small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</p>
                </div>
              </div>
            </div>
            <div class="card border-0 mb-2">
              <div class="card-header p-0 border-0" id="headingThree"><a class="accordion-toggle" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Best services</a></div>
              <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#awardsAccordion">
                <div class="card-body bg-body">
                  <p class="text-small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="border border-primary border-md border-dashed p-5 text-center demo-rounded"><i class="fas fa-award text-primary fa-3x mb-3"></i>
            <p class="small text-gray mb-0 text-uppercase">2019 Award</p>
            <h3 class="h5">Best restaurant in California</h3>
            <p class="small text-gray mb-0">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
