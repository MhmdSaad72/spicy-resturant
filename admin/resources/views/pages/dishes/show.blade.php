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
          <div class="dish-detail-img rounded-circle cube overflow-hidden mx-auto bg-center" style="background: url({{isset($dish->image) ? asset('storage/' . $dish->image) : asset('img/dish-single.png') }})"></div>
        </div>
        <div class="col-lg-6">
          <h2 class="h5 dish-single-price mb-3">${{ isset($dish->price) ? $dish->afterDiscount() : ''}} </h2>
          <h1 class="mb-3">{{ $dish->title ?? ''}}</h1>
          {!! $dish->average() !!}
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
            {{-- review --}}
            <div class="tab-pane fade" id="dish-reviews" role="tabpanel" aria-labelledby="dish-deserts-tab">
              <p class="small text-gray mb-0">Based on {{$reviewCount}} reviews</p>
              <p class="h4 mb-5">How clients reviewed this dish</p>
              <div class="row">
                @foreach ($reviews as $key => $item)
                  <div class="col-lg-6">
                    <!-- Dish review-->
                    <div class="media mb-4"><i class="fas fa-quote-left text-primary fa-2x"></i>
                      <div class="media-body ml-3">
                        <h3 class="h5 mb-0">{{$item->user->name}}</h3>
                        <p class="text-gray small mb-0">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</p>
                        {!! $item->dishStars !!}
                        <p class="text-small text-muted">{{$item->dishReviewBody}}</p>
                      </div>
                    </div>
                  </div>
                @endforeach
                @if (Auth::check() && !$user && Auth::user()->hasRole('user'))
                  <!-- Dish Review Form -->
                  <div class="col-lg-12 mt-4">
                      <a class="btn btn-primary", data-toggle="collapse" href="#dishReview" role="button" aria-expanded="false" aria-controls="dishReview">Review this dish</a>
                      <div class="collapse" id="dishReview">
                          <form class="review-form pt-5 needs-validation" action="{{route('review.dish', ['id' => $dish->id])}}" method="post">
                            {{csrf_field()}}
                              <div class="row">
                                  <div class="form-group col-lg-12">
                                      <label class="label-required m-0" for="dishStars">How many stars</label>
                                      <select class="selectpicker" id="dishStars" name="dishStars" data-style="bs-select-form-control" data-title="How many stars" >
                                          <option value="1" data-content='
                                              <i class="fas fa-star text-primary text-xs"><i>
                                              <i class="fas fa-star text-muted text-xs"><i>
                                              <i class="fas fa-star text-muted text-xs"><i>
                                              <i class="fas fa-star text-muted text-xs"><i>
                                              <i class="fas fa-star text-muted text-xs"><i>
                                              '>hehehe</option>
                                          <option value="2" data-content='
                                                  <i class="fas fa-star text-primary text-xs"><i>
                                                  <i class="fas fa-star text-primary text-xs"><i>
                                                  <i class="fas fa-star text-muted text-xs"><i>
                                                  <i class="fas fa-star text-muted text-xs"><i>
                                                  <i class="fas fa-star text-muted text-xs"><i>
                                              '
                                              >2 stars</option>
                                          <option value="3" data-content='
                                                  <i class="fas fa-star text-primary text-xs"><i>
                                                  <i class="fas fa-star text-primary text-xs"><i>
                                                  <i class="fas fa-star text-primary text-xs"><i>
                                                  <i class="fas fa-star text-muted text-xs"><i>
                                                  <i class="fas fa-star text-muted text-xs"><i>
                                              '
                                              >3 stars</option>
                                          <option value="4" data-content='
                                                  <i class="fas fa-star text-primary text-xs"><i>
                                                  <i class="fas fa-star text-primary text-xs"><i>
                                                  <i class="fas fa-star text-primary text-xs"><i>
                                                  <i class="fas fa-star text-primary text-xs"><i>
                                                  <i class="fas fa-star text-muted text-xs"><i>
                                              '
                                              >4 stars</option>
                                          <option value="5" data-content='
                                                  <i class="fas fa-star text-primary text-xs"><i>
                                                  <i class="fas fa-star text-primary text-xs"><i>
                                                  <i class="fas fa-star text-primary text-xs"><i>
                                                  <i class="fas fa-star text-primary text-xs"><i>
                                                  <i class="fas fa-star text-primary text-xs"><i>
                                              '
                                              >5 stars</option>
                                      </select>
                                      {!! $errors->first('dishStars' , '<div class="invalid-feedback d-block">:message</div>') !!}
                                  </div>
                                  <div class="form-group col-lg-12">
                                      <label class="label-required mb-0" for="dishReviewBody">Your review</label>
                                      <textarea class="form-control bg-none form-control-lg py-3" id="dishReviewBody" name="dishReviewBody" rows="5" placeholder="Leave your review...">{{old('dishReviewBody')}}</textarea>
                                      {!! $errors->first('dishReviewBody' , '<div class="invalid-feedback d-block">:message</div>') !!}
                                  </div>
                                  <div class="form-group col-lg-12">
                                      <button class="btn btn-primary" type="submit">Post your review</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
                @endif
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
          <!-- Related dishes item--><a class="media align-items-center reset-anchor transition-link" href="{{route('dish.show' , ['id'=>$item->id])}}">
            <div class="rounded-circle overflow-hidden" style="width: 130px"><img class="img-fluid" src="{{isset($item->image) ? asset('storage/' . $item->image) : asset('img/dish-single.png') }}" alt="Bucatini"/></div>
            <div class="media-body ml-3">
              <h5>{{ $item->title}}</h5>
              <p class="text-muted small mb-2">{{$item->str_limit($item->content)}}</p>
              <p class="price h6 text-primary mb-0">${{ isset($item->price) ? $item->afterDiscount() : ''}}</p>
            </div></a>
        </div>
        @empty
          <div class="col-12">
            {{'No related dishes'}}
          </div>
        @endforelse
      </div>
    </div>
  </section>
@endsection
