@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#121618">
@endsection
@section('content')
  <!-- Personal information-->
  <section class="py-5">
    <div class="container px-lg-0">
      <header class="mb-5 jumbotron">
        <p class="text-uppercase text-primary font-weight-bold mb-0 small">Personal info</p>
        <h2 class="mb-0">Personal info</h2>
      </header>
      <div class="row">
        <div class="col-lg-3 mb-5">
          @include('includes.user-sidebar' , ['personal'=>true])
        </div>
        <div class="col-lg-9 pl-lg-4">
          <ul class="list-unstyled text-small mb-4">
            <li class="d-flex flex-column flex-md-row py-1 mb-0"><strong class="admin-info-title px-4 pt-2 pb-0 pb-sm-2 bg-dark mr-2">Full name</strong><span class="w-100 px-4 pb-2 pt-0 pt-sm-2 bg-dark">{{ $user->name ?? '' }}</span></li>
            <li class="d-flex flex-column flex-md-row py-1 mb-0"><strong class="admin-info-title px-4 pt-2 pb-0 pb-sm-2 bg-dark mr-2">Email Address</strong><span class="w-100 px-4 pb-2 pt-0 pt-sm-2 bg-dark">{{ $user->email ?? ''}}</span></li>
            <li class="d-flex flex-column flex-md-row py-1 mb-0"><strong class="admin-info-title px-4 pt-2 pb-0 pb-sm-2 bg-dark mr-2">Phone Number</strong><span class="w-100 px-4 pb-2 pt-0 pt-sm-2 bg-dark">{{ $user->phone ?? ''}}</span></li>
            <li class="d-flex flex-column flex-md-row py-1 mb-0"><strong class="admin-info-title px-4 pt-2 pb-0 pb-sm-2 bg-dark mr-2">Country</strong><span class="w-100 px-4 pb-2 pt-0 pt-sm-2 bg-dark">{{ $user->country ?? ''}}</span></li>
          </ul>
          <div class="d-block"><a class="btn btn-primary transition-link" href="{{route('edit.information' , ['id' => $user->id])}}">Edit my information    </a></div>
        </div>
      </div>
    </div>
  </section>
@endsection
