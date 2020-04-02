@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#121618">
@endsection
@section('content')
<!-- Personal reviews-->
<section class="py-5">
    <div class="container px-lg-0">
        <header class="mb-5 jumbotron">
            <p class="text-uppercase text-primary font-weight-bold mb-0 small">Reviews</p>
            <h1 class="h2 mb-0">Review your visit</h1>
            @isset($review->stars)
              {!! $review->stars !!}
            @else
              <p class="small text-gray mb-0">You have not submitted any reviews yet!</p>
            @endisset

        </header>
        <div class="row">
            <div class="col-lg-3 mb-5">
              <div class="admin-nav nav flex-column nav-pills" aria-orientation="vertical">
                <a class="nav-link transition-link" href="{{route('personal.information' , ['id' => $user->id])}}"> <i class="fas fa-user-circle mr-2"></i>Personal Information</a>
                <a class="nav-link transition-link" href="{{route('edit.information' , ['id' => $user->id])}}"> <i class="fas fa-user-edit mr-2"></i>Edit my Information</a>
                <a class="nav-link transition-link" href="{{route('booking.bookings')}}"> <i class="fas fa-calendar-minus mr-2"></i>My Bookings</a>
                <a class="nav-link active" href="{{route('personal.review' , ['id' => $user->id])}}"> <i class="fas fa-star mr-2"></i>My Reviews</a>
                <a class="nav-link transition-link" href="{{route('change.password' , ['id' => $user->id])}}"> <i class="fas fa-lock mr-2"></i>Change my Password</a></div>
            </div>
            <div class="col-lg-9 pl-lg-4">
                @if(!$review)
                    <form class="review-form needs-validation" action="{{route('store.review' , ['id' => $user->id]) }}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="label-required m-0" for="reviewTopic">Review topic</label>
                                <select class="selectpicker" id="reviewTopic" name="reviewTopic" data-style="bs-select-form-control" data-title="Choose your review topic" >
                                    <option value="1" {{ 1 == old('reviewTopic') ? 'selected' : ''}}>Atmosphere</option>
                                    <option value="2" {{ 2 == old('reviewTopic') ? 'selected' : ''}}>Dishes quality</option>
                                    <option value="3" {{ 3 == old('reviewTopic') ? 'selected' : ''}}>Order responsiveness</option>
                                </select>
                                @if ($errors->has('reviewTopic'))
                                  <div class="invalid-feedback d-block">{!! $errors->first('reviewTopic', ':message') !!}</div>
                                @endif
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="label-required m-0" for="stars">How many stars</label>
                                <select class="selectpicker" id="stars" name="stars" data-style="bs-select-form-control" data-title="How many stars" >
                                    <option value="1" data-content='
                                        <i class="fas fa-star text-primary text-xs"><i>
                                        <i class="fas fa-star text-muted text-xs"><i>
                                        <i class="fas fa-star text-muted text-xs"><i>
                                        <i class="fas fa-star text-muted text-xs"><i>
                                        <i class="fas fa-star text-muted text-xs"><i>
                                        '{{ 1 == old('stars') ? 'selected' : ''}}>1 star</option>
                                    <option value="2" data-content='
                                            <i class="fas fa-star text-primary text-xs"><i>
                                            <i class="fas fa-star text-primary text-xs"><i>
                                            <i class="fas fa-star text-muted text-xs"><i>
                                            <i class="fas fa-star text-muted text-xs"><i>
                                            <i class="fas fa-star text-muted text-xs"><i>
                                        '
                                        {{ 2 == old('stars') ? 'selected' : ''}}>2 stars</option>
                                    <option value="3" data-content='
                                            <i class="fas fa-star text-primary text-xs"><i>
                                            <i class="fas fa-star text-primary text-xs"><i>
                                            <i class="fas fa-star text-primary text-xs"><i>
                                            <i class="fas fa-star text-muted text-xs"><i>
                                            <i class="fas fa-star text-muted text-xs"><i>
                                        '
                                        {{ 3 == old('stars') ? 'selected' : ''}}>3 stars</option>
                                    <option value="4" data-content='
                                            <i class="fas fa-star text-primary text-xs"><i>
                                            <i class="fas fa-star text-primary text-xs"><i>
                                            <i class="fas fa-star text-primary text-xs"><i>
                                            <i class="fas fa-star text-primary text-xs"><i>
                                            <i class="fas fa-star text-muted text-xs"><i>
                                        '
                                        {{ 4 == old('stars') ? 'selected' : ''}}>4 stars</option>
                                    <option value="5" data-content='
                                            <i class="fas fa-star text-primary text-xs"><i>
                                            <i class="fas fa-star text-primary text-xs"><i>
                                            <i class="fas fa-star text-primary text-xs"><i>
                                            <i class="fas fa-star text-primary text-xs"><i>
                                            <i class="fas fa-star text-primary text-xs"><i>
                                        '
                                        {{ 5 == old('stars') ? 'selected' : ''}}>5 stars</option>
                                </select>
                                @if ($errors->has('stars'))
                                  <div class="invalid-feedback d-block">{!! $errors->first('stars', ':message') !!}</div>
                                @endif
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="label-required mb-0" for="reviewBody">Your review</label>
                                <textarea class="form-control form-control-lg py-3" id="reviewBody" name="reviewBody" rows="5" placeholder="Leave your review...">{{old('reviewBody')}}</textarea>
                                @if ($errors->has('reviewBody'))
                                  <div class="invalid-feedback d-block">{!! $errors->first('reviewBody', ':message') !!}</div>
                                @endif
                            </div>
                            <div class="form-group col-lg-12">
                                <button class="btn btn-primary" type="submit">Post your review</button>
                            </div>
                        </div>
                    </form>
                @else

                    <!-- Review -->
                    <div class="mb-4 text-center">
                        <i class="fas fa-quote-left text-primary fa-3x mb-4"></i>
                        <div class="mb-4">
                            <h3 class="h5 mb-2">{{$review->reviewTopic ?? ''}}</h3>
                            <p class="text-gray small mb-0"> {{\Carbon\Carbon::parse($review->created_at)->format('d M Y')}} </p>
                            {!!$review->stars!!}

                            <p class="text-small text-muted">{{$review->reviewBody ?? ''}}</p>
                        </div>
                        <a href="{{route('edit.review' , ['id' => $user->id])}}" class="btn btn-primary"> Edit your review</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
