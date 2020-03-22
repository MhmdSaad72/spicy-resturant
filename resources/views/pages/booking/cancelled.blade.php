@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#121618">
@endsection
@section('content')
  <!-- Vertification message section-->
  <section class="text-center">
    <div class="container">
      <div class="row mb-4 pb-3">
        <div class="col-lg-7 mx-auto"><i class="fas fa-frown fa-6x text-primary mb-4"></i>
          <h1 class="h2">Your booking has been cancelled</h1>
          <p class="text-gray">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy</p><a class="btn btn-primary" href="{{route('home.index')}}">Return home</a>
        </div>
      </div>
    </div>
  </section>
@endsection
