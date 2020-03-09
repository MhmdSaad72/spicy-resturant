@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#121618">
@endsection
@section('content')
  <!-- Dish detail section -->
  <section class="bg-pattern">
    <div class="container">
      <div class="row align-items-center text-center text-lg-left mb-5 pb-5">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="dish-detail-img rounded-circle cube overflow-hidden mx-auto bg-center" style="background: url({{isset($dish) ? asset('storage/' . $dish->image) : '' }})"></div>
        </div>
        <div class="col-lg-6">
          <h2 class="h5 dish-single-price mb-3">${{ $dish->price ?? ''}} </h2>
          <h1 class="mb-3">{{ $dish->title ?? ''}}</h1>
          <ul class="list-inline">
            <li class="list-inline-item m-0"><i class="fas fa-star text-primary"></i></li>
            <li class="list-inline-item m-0"><i class="fas fa-star text-primary"></i></li>
            <li class="list-inline-item m-0"><i class="fas fa-star text-primary"></i></li>
            <li class="list-inline-item m-0"><i class="fas fa-star text-primary"></i></li>
            <li class="list-inline-item m-0"><i class="fas fa-star text-lighter"></i></li>
          </ul>
          <p class="text-muted my-4">{{ $dish->content ?? ''}}</p>
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                <li class="px-3 py-2 bg-dark mb-1 text-muted"><span class="font-weight-bold text-uppercase mb-0 small text-light">SKU: </span><span class="small pl-2">{{ $dish->sku ?? ''}}</span></li>
                <li class="px-3 py-2 bg-dark mb-1 text-muted"> <span class="font-weight-bold text-uppercase mb-0 small text-light">Category: </span><a class="reset-anchor small pl-2 transition-link" href="{{route('category.page' , ['id' => $dish->category_id])}}">{{ $dish->category->name ?? ''}}</a></li>
                <li class="px-3 py-2 bg-dark mb-1 text-muted"> <span class="font-weight-bold text-uppercase mb-0 small text-light">Tag: </span><a class="reset-anchor small pl-2" href="#">{{ $dish->tag->name ?? ''}}</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-5 pb-5">
        <div class="col-lg-12">
          <!-- Menu tabs nav-->
          <ul class="nav nav-pills mb-3 flex-column flex-sm-row justify-content-center menu-tabs-nav p-1 bg-dark" id="dish-tab" role="tablist">
            <li class="nav-item flex-sm-fill text-center"><a class="nav-link active" id="dish-description-tab" data-toggle="pill" href="#dish-description" role="tab" aria-controls="dish-description" aria-selected="true">Description</a></li>
            <li class="nav-item flex-sm-fill text-center"><a class="nav-link" id="dish-information-tab" data-toggle="pill" href="#dish-information" role="tab" aria-controls="dish-information" aria-selected="false">Additional information</a></li>
            <li class="nav-item flex-sm-fill text-center"><a class="nav-link" id="dish-reviews-tab" data-toggle="pill" href="#dish-reviews" role="tab" aria-controls="dish-reviews" aria-selected="false">Reviews</a></li>
          </ul>
          <div class="tab-content p-2" id="dish-tabContent">
            <div class="tab-pane fade show active" id="dish-description" role="tabpanel" aria-labelledby="dish-description-tab">
              <p class="text-muted lead">{{ $dish->more_content ?? ''}}</p>
            </div>
            <div class="tab-pane fade" id="dish-information" role="tabpanel" aria-labelledby="dish-information-tab">
              <div class="row">
                <div class="col-lg-5">
                  <ul class="list-unstyled mb-0">
                    <li class="px-3 py-2 bg-dark mb-1"> <span class="font-weight-bold text-uppercase mb-0 small">Weight: </span><span class="small text-muted pl-2">{{ $dish->weight ?? ''}} Kg</span></li>
                    <li class="px-3 py-2 bg-dark mb-1"> <span class="font-weight-bold text-uppercase mb-0 small">Calories: </span><span class="small text-muted pl-2">{{ $dish->calories ?? ''}} Cal</span></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="dish-reviews" role="tabpanel" aria-labelledby="dish-deserts-tab">
              <p class="small text-gray mb-0">Based on 2 reviews</p>
              <p class="h4 mb-5">How clients reviewed this dish</p>
              <div class="row">
                <div class="col-lg-6">
                  <!-- Dish review-->
                  <div class="media mb-4"><i class="fas fa-quote-left text-primary fa-2x"></i>
                    <div class="media-body ml-3">
                      <h3 class="h5 mb-0">Jason Doe</h3>
                      <p class="text-gray small mb-0">20 Jan 2019  </p>
                      <ul class="list-inline mb-3">
                        <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                        <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                        <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                        <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                        <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                      </ul>
                      <p class="text-small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <!-- Dish review-->
                  <div class="media mb-4"><i class="fas fa-quote-left text-primary fa-2x"></i>
                    <div class="media-body ml-3">
                      <h3 class="h5 mb-0">Patrick Wood</h3>
                      <p class="text-gray small mb-0">15 Mar 2019  </p>
                      <ul class="list-inline mb-3">
                        <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                        <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                        <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                        <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                        <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                      </ul>
                      <p class="text-small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Section heading-->
      <header class="bg-heading-text mb-5" data-text="Related">
        <div class="index-forward">
          <p class="text-uppercase text-primary font-weight-bold small mb-2">Related dishes</p>
          <h2>Similar to this dish</h2>
        </div>
      </header>
      <div class="row">
        @forelse ($similarDishes as $key => $item)
          <div class="col-lg-4 mb-4 mb-lg-0">
          <!-- Related dishes item--><a class="media align-items-center reset-anchor transition-link" href="dish.html">
            <div class="rounded-circle overflow-hidden" style="width: 130px"><img class="img-fluid" src="{{asset('storage/' . $item->image)}}" alt="Bucatini"/></div>
            <div class="media-body ml-3">
              <h5>{{ $item->title}}</h5>
              <p class="text-muted small mb-2">{{$item->str_limit($item->content)}}</p>
              <p class="price h6 text-primary mb-0">${{$item->price}}</p>
            </div></a>
        </div>
        @empty
           {{'No related dishes'}}
        @endforelse
      </div>
    </div>
  </section>
@endsection
