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
  <!-- Statistics section-->
  <section class="bg-dark">
    <div class="container">
      <div class="row text-center">
        @foreach ($statistics as $key => $item)
          <div class="col-lg-3 col-md-6 mb-4 mb-lg-0"><img class="mb-3" src="{{isset($item->image) ? asset('storage/' . $item->image) : asset('img/stats-1-default.svg') }}" alt="..." height="40">
            <h2 class="line-height-sm">{{$item->count}}</h2>
            <p class="small text-muted">{{$item->title}}</p>
          </div>
        @endforeach
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
            @foreach ($awardsaccordion as $kay => $item)
              <div class="card border-0 mb-2">
              <div class="card-header p-0 border-0" id="{{$item->title}}"><a class="accordion-toggle" href="#" data-toggle="collapse" data-target="{{'#collapse'. $kay}}" aria-expanded="false" aria-controls="collapseOne">{{$item->title}}</a></div>
              <div class="collapse" id="{{'collapse'. $kay}}" aria-labelledby="{{$item->title}}" data-parent="#awardsAccordion">
                <div class="card-body bg-body">
                  <p class="text-small text-muted mb-0">{{$item->content}}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <div class="col-lg-4">
          <div class="border border-primary border-md border-dashed p-5 text-center demo-rounded"><i class="fas fa-award text-primary fa-3x mb-3"></i>
            <p class="small text-gray mb-0 text-uppercase">{{isset($award) ? \Carbon\Carbon::parse($award->year)->format('Y') : ''}} Award</p>
            <h3 class="h5">{{$award->description ?? ''}}</h3>
            <p class="small text-gray mb-0">{{$award->content ?? ''}}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
