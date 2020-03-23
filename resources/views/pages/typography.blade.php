@extends('layouts.master')
@section('title' , 'Italiano Restaurant | Laravel Restaurant Template')
@section('meta')
  <meta name="theme-color" content="#0f1214">
@endsection
@section('content')
<!-- Hero Section -->
<section class="hero-sm bg-pattern bg-dark">
  <div class="container text-center">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <p class="text-uppercase text-primary font-weight-bold mb-3">Typography</p>
        <h1 class="mb-4">Typography</h1>
        <p class="text-muted">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p><a class="btn btn-primary transition-link" href="{{route('booking.index')}}">Book a table</a>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="pb-5 border-bottom border-dark border-md mb-5">
          <h1 class="h1">Heading looks like this</h1>
          <h2>Heading looks like this</h2>
          <h3>Heading looks like this</h3>
          <h4>Heading looks like this</h4>
          <h5>Heading looks like this</h5>
          <h6>Heading looks like this</h6>
        </div>
        <div class="pb-5 border-bottom border-dark border-md mb-5">
          <!-- Section heading-->
          <header class="bg-heading-text mb-4" data-text="">
            <div class="index-forward">
              <p class="text-uppercase text-primary font-weight-bold small mb-2">Text</p>
              <h2>Paragraphs</h2>
            </div>
          </header>
          <p class="lead">Lorem ipsum dolor sit amet, <strong>consectetur </strong>adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut <strong>enim </strong>ad minim veniam</p>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
          <p class="text-small text-muted"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p class="text-gray text-small">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="pb-5 border-bottom border-dark border-md mb-5">
          <!-- Section heading-->
          <header class="bg-heading-text mb-4" data-text="">
            <div class="index-forward">
              <p class="text-uppercase text-primary font-weight-bold small mb-2">Drop caps</p>
              <h2>Drop caps</h2>
            </div>
          </header>
          <p class="drop-caps text-muted lead mb-4">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <div class="row">
            <div class="col-lg-6">
              <p class="drop-caps text-small drop-caps-secondary text-gray lead mb-4">Lorem ipsum dolor sit amet, consec adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad.</p>
            </div>
            <div class="col-lg-6">
              <p class="drop-caps text-small drop-caps-success text-gray lead mb-4">Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. labore et dolore magna aliqua. Ut enim ad.</p>
            </div>
          </div>
        </div>
        <div class="pb-5 border-bottom border-dark border-md mb-5">
          <!-- Section heading-->
          <header class="bg-heading-text mb-4" data-text="">
            <div class="index-forward">
              <p class="text-uppercase text-primary font-weight-bold small mb-2">Highlighters</p>
              <h2>Highlighters</h2>
            </div>
          </header>
          <p class="text-muted mb-0">Lorem ipsum dolor sit amet, <span class="highlight highlight-primary">consectetur</span> adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad <span class="highlight highlight-info">veniam</span> quis nostrud ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        </div>
        <div class="pb-5 border-bottom border-dark border-md mb-5">
          <!-- Section heading-->
          <header class="bg-heading-text mb-4" data-text="">
            <div class="index-forward">
              <p class="text-uppercase text-primary font-weight-bold small mb-2">Blockquotes</p>
              <h2>Blockquotes</h2>
            </div>
          </header>
          <blockquote class="blockquote border-0 p-0">
            <p class="blockquote-text text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <footer class="blockquote-footer mt-2">Sundar Pichai
              <cite>Spicy restaurant CEO</cite>
            </footer>
          </blockquote>
          <div class="row">
            <div class="col-lg-6">
              <blockquote class="blockquote border-0 p-0">
                <p class="blockquote-text text-muted p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                <footer class="blockquote-footer mt-2">
                  <div class="h6 mb-0">Sundar Pichai</div>
                  <cite>Spicy restaurant CEO</cite>
                </footer>
              </blockquote>
            </div>
            <div class="col-lg-6">
              <blockquote class="blockquote border-0 p-0">
                <p class="blockquote-text text-muted p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                <footer class="blockquote-footer mt-2">
                  <div class="h6 mb-0">Sundar Pichai</div>
                  <cite>Spicy restaurant CEO</cite>
                </footer>
              </blockquote>
            </div>
          </div>
        </div>
        <div class="pb-0">
          <!-- Section heading-->
          <header class="bg-heading-text mb-4" data-text="">
            <div class="index-forward">
              <p class="text-uppercase text-primary font-weight-bold small mb-2">Standard Lists</p>
              <h2>Lists</h2>
            </div>
          </header>
          <div class="row">
            <div class="col-md-4">
              <!--  Ordered list with custom style -->
              <ol class="custom-numbers p-0">
                <li class="mb-1">Neapolitan pizza</li>
                <li class="mb-1">Greek pizza</li>
                <li class="mb-1">Margherita</li>
                <li class="mb-1">Pepproni</li>
              </ol>
            </div>
            <div class="col-md-4">
              <!--  List with bullets -->
              <ul class="list-bullets p-0">
                <li class="mb-1">Neapolitan pizza</li>
                <li class="mb-1">Greek pizza</li>
                <li class="mb-1">Margherita</li>
                <li class="mb-1">Pepproni</li>
              </ul>
            </div>
            <div class="col-md-4">
              <ul class="list-unstyled list p-0">
                <li class="mb-1 d-flex align-items-center"><i class="fa fa-flask mr-2 fa-fw text-primary"></i>Neapolitan pizza</li>
                <li class="mb-1 d-flex align-items-center"><i class="fa fa-hourglass-end mr-2 fa-fw text-primary"></i>Greek pizza</li>
                <li class="mb-1 d-flex align-items-center"><i class="fa fa-inbox mr-2 fa-fw text-primary"></i>Margherita</li>
                <li class="mb-1 d-flex align-items-center"><i class="fa fa-rocket mr-2 fa-fw text-primary"></i>Pepproni</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
