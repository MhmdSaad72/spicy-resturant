@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#0f1214">
@endsection
@section('content')
  <?php $heroDark = true ;
        $about = true ?>
  <!-- Hero Section -->
  <section class="hero-sm bg-pattern bg-dark">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-7 mx-auto">
          <p class="text-uppercase text-primary font-weight-bold mb-3">{{ $aboutUs->title ?? '' }}</p>
          <h1>{{ $aboutUs->description ?? '' }}</h1>
          <p class="text-muted">{{ $aboutUs->content ?? '' }}</p><a class="btn btn-primary transition-link" href="{{route('booking.index')}}">Book a table</a>
        </div>
      </div>
    </div>
  </section>
  <!-- About services section-->
  <section class="pb-0">
    <div class="container">
      <div class="row align-items-stretch p-4 p-lg-0 demo-rounded overlay-hidden">
        @foreach ($aboutservices as $key => $item)
          <!-- Image block -->
          <div class="col-lg-4 col-md-6 mb-2 mb-lg-0 p-0 about-services-block" style="background: url({{asset('storage/' . $item->image)}})"></div>
          <!-- Text block -->
          <div class="col-lg-4 col-md-6 mb-2 mb-lg-0 p-5 about-services-block bg-dark"><img class="mb-3" src="{{asset('storage/' . $item->icon)}}" alt="cutlery" height="40">
            <h3 class="h4 mb-3">{{$item->title}}</h3>
            <p class="mb-0 text-small text-muted">{{$item->content}}</p>
          </div>
        @endforeach
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
              <p class="text-uppercase text-primary font-weight-bold small mb-2">{{$philosophy->title ?? ''}}</p>
              <h2>{{$philosophy->description ?? ''}}</h2>
            </div>
          </header>
          <blockquote class="blockquote border-0 text-center">
            <p class="drop-caps text-center text-muted mb-4">{{$philosophy->content ?? ''}}</p>
            <footer class="blockquote-footer">{{$philosophy->name ?? ''}}
              <cite>{{$philosophy->position ?? ''}}</cite>
            </footer>
          </blockquote>
        </div>
      </div>
    </div>
  </section>
  <!-- Gallery section-->
  @include('includes.gallary')
  <!-- Opening hours section-->
  <section class="pb-5 mb-5">
      @include('includes.opening-hours')
  </section>
@endsection
