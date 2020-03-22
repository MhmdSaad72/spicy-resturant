@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#121618">
@endsection

@section('content')
  <!-- Activation code section-->
  <section>
    <div class="container">
      <!-- Section heading-->
      <header class="bg-heading-text text-center mb-4" data-text="Activation">
        <div class="index-forward">
          <p class="text-uppercase text-primary font-weight-bold small mb-2">Verification</p>
          <h1>Verify your account</h1>
        </div>
      </header>
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <p class="text-muted text-center mb-5">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
          <p class="text-muted text-center mb-5">{{ __('If you did not receive the email') }}</p>
          <form class="activation-form needs-validation" action="{{ route('verification.resend') }}" method="POST">
            @csrf
            <div class="form-group">
              <button class="btn btn-primary btn-block" type="submit">click here to request another</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
