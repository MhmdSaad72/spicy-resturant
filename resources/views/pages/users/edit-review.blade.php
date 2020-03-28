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
            <h1 class="h2 mb-0">Edit your review</h1>
            {{-- <p class="small text-gray mb-0">You have not submitted any reviews yet!</p> --}}
            {!! $review->stars ?? '' !!}
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
                <form class="review-form needs-validation" action="{{route('update.review' , ['id' => $user->id]) }}" method="post">
                  {{ method_field('PATCH') }}
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="label-required m-0" for="reviewTopic">Review topic</label>
                            <select class="selectpicker" id="reviewTopic" name="reviewTopic" data-style="bs-select-form-control" data-title="Choose your review topic" required>
                                <option value="1" {{ $review->reviewTopic == $review->getReviewTopicAttribute(1) ? 'selected' : ''}}>Atmosphere</option>
                                <option value="2" {{ $review->reviewTopic == $review->getReviewTopicAttribute(2) ? 'selected' : ''}}>Dishes quality</option>
                                <option value="3" {{ $review->reviewTopic == $review->getReviewTopicAttribute(3) ? 'selected' : ''}}>Order responsiveness</option>
                            </select>
                            @if ($errors->has('reviewTopic'))
                              <div class="invalid-feedback d-block">{!! $errors->first('reviewTopic', ':message') !!}</div>
                            @endif
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="label-required m-0" for="stars">How many stars</label>
                            <select class="selectpicker" id="stars" name="stars" data-style="bs-select-form-control" data-title="How many stars" required>
                                <option value="1" {{ $review->stars == $review->getStarsAttribute(1) ? 'selected' : ''}} data-content='
                                    <i class="fas fa-star text-primary text-xs"><i>
                                    <i class="fas fa-star text-muted text-xs"><i>
                                    <i class="fas fa-star text-muted text-xs"><i>
                                    <i class="fas fa-star text-muted text-xs"><i>
                                    <i class="fas fa-star text-muted text-xs"><i>
                                    '>hehehe</option>
                                <option value="2" {{ $review->stars == $review->getStarsAttribute(2) ? 'selected' : ''}} data-content='
                                        <i class="fas fa-star text-primary text-xs"><i>
                                        <i class="fas fa-star text-primary text-xs"><i>
                                        <i class="fas fa-star text-muted text-xs"><i>
                                        <i class="fas fa-star text-muted text-xs"><i>
                                        <i class="fas fa-star text-muted text-xs"><i>
                                    '
                                    >2 stars</option>
                                <option value="3" {{ $review->stars == $review->getStarsAttribute(3) ? 'selected' : ''}} data-content='
                                        <i class="fas fa-star text-primary text-xs"><i>
                                        <i class="fas fa-star text-primary text-xs"><i>
                                        <i class="fas fa-star text-primary text-xs"><i>
                                        <i class="fas fa-star text-muted text-xs"><i>
                                        <i class="fas fa-star text-muted text-xs"><i>
                                    '
                                    >3 stars</option>
                                <option value="4" {{ $review->stars == $review->getStarsAttribute(4) ? 'selected' : ''}} data-content='
                                        <i class="fas fa-star text-primary text-xs"><i>
                                        <i class="fas fa-star text-primary text-xs"><i>
                                        <i class="fas fa-star text-primary text-xs"><i>
                                        <i class="fas fa-star text-primary text-xs"><i>
                                        <i class="fas fa-star text-muted text-xs"><i>
                                    '
                                    >4 stars</option>
                                <option value="5" {{ $review->stars == $review->getStarsAttribute(5) ? 'selected' : ''}} data-content='
                                        <i class="fas fa-star text-primary text-xs"><i>
                                        <i class="fas fa-star text-primary text-xs"><i>
                                        <i class="fas fa-star text-primary text-xs"><i>
                                        <i class="fas fa-star text-primary text-xs"><i>
                                        <i class="fas fa-star text-primary text-xs"><i>
                                    '
                                    >5 stars</option>
                            </select>
                            @if ($errors->has('stars'))
                              <div class="invalid-feedback d-block">{!! $errors->first('stars', ':message') !!}</div>
                            @endif
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="label-required mb-0" for="reviewBody">Your review</label>
                            <textarea class="form-control form-control-lg py-3" id="reviewBody" name="reviewBody" rows="5" placeholder="Leave your review...">{{$review->reviewBody ?? ''}}</textarea>
                            @if ($errors->has('reviewBody'))
                              <div class="invalid-feedback d-block">{!! $errors->first('reviewBody', ':message') !!}</div>
                            @endif
                        </div>
                        <div class="form-group col-lg-12">
                            <button class="btn btn-primary" type="submit">Update your review</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
