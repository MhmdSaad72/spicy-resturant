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
        <div class="row align-items-center">
          <div class="col-lg-7 mb-2 mb-lg-0">
            <p class="text-uppercase text-primary font-weight-bold mb-0 small">Category</p>
            <h1 class="h2 mb-0">{{ $category->name ?? '' }}</h1>
          </div>
          <div class="col-lg-5 text-left text-lg-right"><a class="btn btn-link px-0 transition-link btn-sm" href="{{route('home.index')}}"> <i class="fas fa-home mr-2"></i>Return home</a></div>
        </div>
      </header>
      <div class="media align-items-center"><i class="fas fa-border-all fa-3x"></i>
        <div class="ml-2">
          <p class="h4 mb-0">{{$count}} items</p>
          <p class="text-gray text-small font-weight-normal mb-5">We've found {{$count}} items for this category.</p>
        </div>
      </div>
      <div class="row align-items-stretch">
        @foreach ($dishes as $key => $item)
          <div class="col-md-6 mb-4"><a class="media reset-anchor transition-link p-4 bg-dark h-100" href="{{route('dish.show' , ['id' => $item->id])}}"><img class="img-fluid" src="{{isset($item->image) ? asset('storage/' . $item->image) : asset('img/dish-single.png') }}" alt="..." width="130">
              <div class="ml-3">
                <h5>{{$item->title}}</h5>
                <p class="text-muted small mb-2">{{$item->str_limit($item->content)}}</p>
                <p class="price h6 text-primary mb-0">${{$item->price}}</p>
              </div></a></div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
