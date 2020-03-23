@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#121618">
@endsection
@section('content')
<div class="page-content">
    <section class="text-center">
        <div class="container">
            <div class="row mb-4 pb-3">
                <div class="col-lg-7 mx-auto">
                    <!-- Section heading-->
                    <header class="bg-heading-text text-center mb-4" data-text="Gallery">
                        <div class="index-forward">
                            <p class="text-uppercase text-primary font-weight-bold small mb-2">Gallery</p>
                            <h1>Our Gallery</h1>
                        </div>
                    </header>
                </div>
            </div>

            <div class="owl-carousel gallery-slider owl-theme">
              @foreach ($album as  $img)
                <a class="d-block gallery-slider-item shadow overflow-hidden" href="{{asset('storage/' . $img->image)}}" data-lightbox="Gallery" title="{{$img->title}}">
                  <img class="img-fluid" src="{{asset('storage/' . $img->image)}}" alt="...">
                </a>
              @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
