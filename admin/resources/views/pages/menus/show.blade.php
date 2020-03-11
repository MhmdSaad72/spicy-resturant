@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#0f1214">
@endsection
@section('content')
  <?php $heroDark = true  ;
    $menu = true ;?>
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
            <div class="owl-carousel owl-theme signature-dishes-slider">
              @foreach ($category->slide_menus as $key => $item)
                <!-- Signature slide--><a class="media align-items-center reset-anchor transition-link" href="{{route('dish.show' , ['id'=>$item->id])}}">
                <div class="rounded-circle mx-auto overflow-hidden" style="width: 130px"><img src="{{isset($item->image) ? asset('storage/' . $item->image) : ''}}" alt="Bucatini"/></div>
                <div class="media-body ml-3">
                  <h5>{{$item->title ?? ''}}</h5>
                  <p class="text-muted small mb-2">{{isset($item->content) ? $item->str_limit($item->content) : ''}}</p>
                  <p class="price h6 text-primary mb-0">${{$item->price ?? ''}}</p>
                </div></a>
              @endforeach
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
                <div class="col-lg-6 mb-2">
                  <!-- Menu item--><a class="menu-item-minimal reset-anchor" href="{{route('dish.show' , ['id'=>$item->id])}}">
                    <div class="d-flex align-items-end mb-1">
                      <h5 class="mb-0">{{$item->title ?? ''}}</h5>
                      <div class="menu-item-separator mb-1"></div>
                      <p class="h6 text-primary price mb-0">${{$item->price ?? ''}}</p>
                    </div>
                    <p class="text-muted text-small">{{isset($item->content) ? $item->str_limit($item->content) : ''}}</p></a>
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
