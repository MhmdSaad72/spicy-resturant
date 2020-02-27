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
          <p class="text-uppercase text-primary font-weight-bold mb-3">{{$foodMenu->title ?? ''}}</p>
          <h1>{{$foodMenu->description ?? ''}}</h1>
          <p class="text-muted">{{$foodMenu->content ?? ''}}</p><a class="btn btn-primary transition-link" href="{{route('booking.index')}}">Book a table</a>
        </div>
      </div>
    </div>
  </section>
  @foreach ($categories as $key => $category)
      @if ($loop->first)
        <!-- Signature dishes section -->
        <section>
          <div class="container">
            <!-- Section heading-->
            <header class="bg-heading-text text-center mb-5" data-text="Signature">
              <div class="index-forward">
                <p class="text-uppercase text-primary font-weight-bold small mb-2">{{$category->title ?? ''}}</p>
                <h2>{{$category->description ?? ''}}</h2>
              </div>
            </header>
            <div class="row pt-4">
              <div class="col-lg-7 mx-auto">
                <div class="row">
                  @foreach ($category->slide_menus as $key => $item)
                    <div class="col-lg-12 mb-2">
                    <!-- Signature dishes item--><a class="media menu-item d-flex align-items-center justify-content-between px-4 py-4 mb-4 bg-dark reset-anchor transition-link" href="dish.html">
                      <div class="media-body mr-2">
                        <h2 class="h5 mb-0">{{$item->title ?? ''}}</h2>
                        <p class="small text-muted mb-0">{{$item->content ? $item->str_limit($item->content) : ''}}</p>
                        <p class="price h6 price mb-0">${{$item->price ?? ''}}</p>
                      </div>
                      <div class="menu-home-item-image rounded-circle overflow-hidden"><img src="{{asset('storage/' . $item->image)}}" alt="Diablo"/></div></a>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Divider section-->
        <section class="parallax-divider bg-cover" style="background: url({{asset('img/divider-bg-2.jpg')}})">
          <div class="py-5"></div>
        </section>
      @else
        <!-- Pizzas section-->
        <section>
          <div class="container">
            <!-- Section heading-->
            <header class="bg-heading-text text-center mb-5" data-text="Pizzas">
              <div class="index-forward">
                <p class="text-uppercase text-primary font-weight-bold small mb-2">{{$category->title ?? ''}}</p>
                <h2>{{$category->description ?? ''}}</h2>
              </div>
            </header>
            <div class="row pt-4">
              @foreach ($category->slide_menus as $key => $item)
                <div class="col-lg-6 mb-4 pb-2">
                  {{-- {{dd($item->image)}} --}}
                <!-- Menu item--><a class="menu-item ribboned d-flex align-items-center justify-content-between px-4 py-4 reset-anchor transition-link bg-dark" href="dish.html">
                  <div class="mr-2">
                    <h2 class="h5 mb-0">{{$item->title ?? ''}}</h2>
                    <p class="small text-muted mb-0">{{$item->content ? $item->str_limit($item->content) : ''}}</p>
                    <p class="h6 price mb-0">${{$item->price ?? ''}}</p>
                  </div>
                  <div class="menu-item-image rounded-circle mx-auto overflow-hidden"><img src="{{asset('storage/' . $item->image)}}" alt="Diablo"/></div></a>
              </div>
              @endforeach
            </div>
          </div>
        </section>
        <!-- Divider section-->
        <section class="parallax-divider bg-cover" style="background: url({{asset('img/divider-bg-2.jpg')}})">
          <div class="py-5"></div>
        </section>
      @endif
  @endforeach
@endsection
