@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#121618">
@endsection
@section('content')
  <?php $home = true ?>
    <!-- Hero Section -->
    <section class="hero bg-pattern bg-hero-text" data-text="restaurant">
      <div class="container text-center text-lg-left">
        <div class="row align-items-center">
          <div class="col-lg-6 order-2 order-lg-1">
            <p class="text-uppercase text-primary font-weight-bold mb-3">{{$service->title ?? ''}}</p>
            <h1 class="mb-4">{{$service->description ?? ''}}</h1>
            <p class="lead text-muted"><a class="reset-anchor text-muted" href="http://maps.google.com/maps?q=210+Louise+Ave,+Nashville,+TN+37203"><i class="fas fa-globe-africa text-primary mr-2"></i>{{$service->address ?? ''}}</a></p>
            <p>{{$service->content ?? ''}}.</p>
            <ul class="list-inline mb-0">
              <li class="list-inline-item py-1"><a class="btn btn-primary transition-link" href="{{route('booking.index')}}">Book a table</a></li>
              <li class="list-inline-item py-1"><a class="btn btn-outline-light transition-link" href="{{route('about.show')}}">Discover more </a></li>
            </ul>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 mb-5 mb-lg-0"><img class="img-fluid d-block mx-auto hero-img" src="{{asset('storage/' . $service->image)}}" alt="dish"></div>
        </div>
      </div>
    </section>
    <!-- Main dish section -->
    <section class="pb-0">
      <div class="container text-center text-lg-left">
        <div class="row align-items-stretch">
          <div class="col-lg-6 pr-lg-0 order-2 order-lg-1">
            <div class="h-100 bg-dark d-flex align-items-center">
              <div class="p-5">
                <p class="text-primary font-weight-bold small text-uppercase mb-2">{{$mainDish->title ?? ''}}</p>
                <h2>{{$mainDish->description ?? ''}}</h2>
                <p class="text-muted text-small mb-3">{{$mainDish->content ?? ''}}</p>
                <ul class="list-inline mb-0">
                  <li class="list-inline-item py-1"><a class="btn btn-primary transition-link" href="{{route('booking.index')}}">Book a table</a></li>
                  <li class="list-inline-item py-1"><a class="btn btn-outline-light transition-link" href="dish.html">Dish detail</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-6 pl-lg-0 order-1 order-lg-2">
            <div class="h-100 bg-center bg-cover main-dish-image" style="background: url({{asset('storage/' . $mainDish->image)}})"></div>
          </div>
        </div>
      </div>
    </section>
    <!-- About us section -->
    <section>
      <div class="container">
        <!-- Section heading-->
        <header class="bg-heading-text text-center mb-4" data-text="About">
          <div class="index-forward">
            <p class="text-uppercase text-primary font-weight-bold small mb-2">{{$ourStory->title ?? ''}}</p>
            <h2>{{$ourStory->description ?? ''}}</h2>
          </div>
        </header>
        <div class="row text-center">
          <div class="col-lg-7 mx-auto">
            <p class="text-muted mb-4">{{$ourStory->content ?? ''}}</p><a class="btn btn-primary" href="about-1.html">Discover more</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Our services section -->
    <section class="bg-dark">
      <div class="container">
        <!-- Section heading-->
        <header class="bg-heading-text text-center mb-5" data-text="Services">
          <div class="index-forward">
            <p class="text-uppercase text-primary font-weight-bold small mb-2">{{$ourServicesHead->title ?? ''}}</p>
            <h2>{{$ourServicesHead->description ?? ''}}</h2>
          </div>
        </header>
        <div class="row text-center">
          @foreach ($ourServicesBody as $key => $item)
            <div class="col-lg-3 col-sm-6">
              <!-- Services item-->
              <div class="services-item px-4 py-5"><img class="mb-3" src="{{asset('storage/' . $item->image)}}" alt="{{$item->title}}" height="50"/>
                <h3 class="h5">{{$item->title}}</h3>
                <p class="small text-muted mb-0">{{$item->content}}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- Featured dishes section -->
    <section>
      <div class="container">
        <!-- Section heading-->
        <header class="bg-heading-text text-center mb-5" data-text="Featured">
          <div class="index-forward">
            <p class="text-uppercase text-primary font-weight-bold small mb-2">{{$featurDishHead->title ?? ''}}</p>
            <h2>{{$featurDishHead->description ?? ''}}</h2>
          </div>
        </header>
        <div class="owl-carousel owl-theme featured-dishes-slider owl-padding owl-equalize-height">
          @foreach ($featurDishBody as $key => $item)
              @isset($item->old_price)
                <!-- Featured dish--><a class="d-block reset-anchor transiton-link featured-dishes-item text-center p-5 m-2 h-100 d-flex flex-column justify-content-center discounted" href="dish.html"><img class="img-fluid mb-4" src="{{asset('storage/' . $item->image)}}" alt=""/>
                  <h3 class="h5">{{$item->title}}</h3>
                  <p class="text-muted">{{$item->content}}</p>
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <p class="text-gray">
                        <del>${{$item->old_price}}</del>
                      </p>
                    </li>
                    <li class="list-inline-item">
                      <p class="h6 text-primary">${{$item->price}}</p>
                    </li>
                  </ul>
                  <div class="discounted-ribbon">Discounted</div></a>
              @else
                <!-- Featured dish--><a class="d-block reset-anchor transiton-link featured-dishes-item text-center p-5 m-2 h-100 d-flex flex-column justify-content-center" href="dish.html"><img class="img-fluid mb-4" src="{{asset('storage/' . $item->image)}}" alt=""/>
                      <h3 class="h5">{{$item->title}}</h3>
                      <p class="text-muted">{{$item->content}}</p>
                      <p class="h6 text-primary">${{$item->price}}</p></a>
              @endisset
          @endforeach
        </div>
      </div>
    </section>
    <!-- Menu section-->
    <section class="bg-dark">
      <div class="container">
        <!-- Section heading-->
        <header class="bg-heading-text text-center mb-5" data-text="Menu">
          <div class="index-forward">
            <p class="text-uppercase text-primary font-weight-bold small mb-2">{{$foodMenu->title ?? ''}}</p>
            <h2>{{$foodMenu->description ?? ''}}</h2>
          </div>
        </header>
        <!-- Menu tabs nav-->
        <ul class="nav nav-pills menu-nav mb-3 flex-column flex-sm-row justify-content-center menu-tabs-nav p-3 bg-body" id="menu-tab" role="tablist">
          @foreach ($categories as $key => $item)
            @if ($loop->first)
              <li class="nav-item"><a class="nav-link text-light active" id="{{'menu-'.$item->name.'-tab'}}" data-toggle="pill" href="{{'#menu-'.$item->name}}" role="tab" aria-controls="{{'menu-'.$item->name}}" aria-selected="true">{{$item->name}}</a></li>
              @else
              <li class="nav-item"><a class="nav-link text-light" id="{{'menu-'.$item->name.'-tab'}}" data-toggle="pill" href="{{'#menu-'.$item->name}}" role="tab" aria-controls="{{'menu-'.$item->name}}" aria-selected="false">{{$item->name}}</a></li>
            @endif
          @endforeach
        </ul>
        <div class="tab-content py-4" id="menu-tabContent">
          @foreach ($categories as $key => $category)
           @if($loop->first)
           <div class="tab-pane fade show active" id="{{'menu-'.$category->name}}" role="tabpanel" aria-labelledby="{{'menu-'.$category->name.'-tab'}}">
               <div class="row">
                   @foreach ($category->slide_menus as $key => $item)
                   <div class="col-lg-6 mb-4 pb-2">
                       <!-- Menu item--><a class="menu-item ribboned d-flex align-items-center justify-content-between px-4 py-4 reset-anchor transition-link bg-body" href="{{route('dish.show' , ['id' => $item->id])}}">
                       <div class="mr-2">
                           <h2 class="h5 mb-0">{{$item->title}}</h2>
                           <p class="small text-muted mb-0">{{$item->str_limit($item->content)}}</p>
                           <p class="h6 price mb-0">${{$item->price}}</p>
                       </div>
                       <div class="menu-item-image rounded-circle mx-auto overflow-hidden"><img src="{{asset('storage/' . $item->image)}}" alt="Diablo"/></div></a>
                   </div>
                   @endforeach
               </div>
           </div>
           @else
           <div class="tab-pane fade" id="{{'menu-'.$category->name}}" role="tabpanel" aria-labelledby="{{'menu-'.$category->name.'-tab'}}">
               <div class="row">
                   @foreach ($category->slide_menus as $key => $item)
                   <div class="col-lg-6 mb-4 pb-2">
                       <!-- Menu item--><a class="menu-item ribboned d-flex align-items-center justify-content-between px-4 py-4 reset-anchor transition-link bg-body" href="{{route('dish.show' , ['id' => $item->id])}}">
                       <div class="mr-2">
                           <h2 class="h5 mb-0">{{$item->title}}</h2>
                           <p class="small text-muted mb-0">{{$item->str_limit($item->content)}}</p>
                           <p class="h6 price mb-0">${{$item->price}}</p>
                       </div>
                       <div class="menu-item-image rounded-circle mx-auto overflow-hidden"><img src="{{asset('storage/' . $item->image)}}" alt="Diablo"/></div></a>
                   </div>
                   @endforeach
               </div>
           </div>
           @endif
          @endforeach


        </div>
      </div>
    </section>
    <!-- Chefs section-->
    @include('includes.chefs')
    <!-- Opening hours section-->
    @include('includes.opening-hours')
    <!-- Gallery Section-->
    @include('includes.gallary')
    <!-- Scroll top button-->
    <div class="scroll-top-btn" id="scrollTop"><i class="fas fa-long-arrow-alt-up"></i><span class="font-weight-bold text-uppercase small">To Top</span></div>

@endsection
@section('preloader')
  @include('includes.preloader')
@endsection
