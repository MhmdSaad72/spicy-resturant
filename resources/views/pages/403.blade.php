@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#121618">
@endsection
@section('content')
  {{-- {{dd($basicDetail)}} --}}
  <!-- 404 Error message-->
  <section>
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- Section heading-->
          <header class="bg-heading-text text-center heading-lg" data-text="Not found">
            <div class="index-forward">
              <p class="text-uppercase text-primary font-weight-bold small mb-2">Not autherized</p>
              <h2>403</h2>
            </div>
          </header>
          <p class="lead text-muted">Sorry, you are not autherized to access this page.</p><a class="btn btn-primary transition-link" href="{{route('home.index')}}">Return home</a>
        </div>
      </div>
    </div>
  </section>
@endsection
