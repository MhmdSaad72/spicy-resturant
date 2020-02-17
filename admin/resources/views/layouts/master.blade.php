<!DOCTYPE html>
<html>
  <head>
    <!-- Charset meta -->
    <meta charset="utf-8">
    <!-- IE compatibility meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Page title -->
    <title>@yield('title') </title>
    <!-- Description meta -->
    <meta name="description" content="">
    <!-- Author meta -->
    <meta name="author" content="">
    <!-- Address bar meta -->
    <meta name="theme-color" content="#121618">
    <!-- Viewport meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Robot meta - for search engins -->
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Google fonts - Aclonica for headings & Poppins for text -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,600&amp;display=swap">
    <!-- Owl carousel 2 -->
    <link rel="stylesheet" href="{{asset('vendor/owl.carousel2/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/owl.carousel2/assets/owl.theme.default.min.css')}}">
    <!-- Lightbox2 -->
    <link rel="stylesheet" href="{{asset('vendor/lightbox2/css/lightbox.min.css')}}">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-select/css/bootstrap-select.min.css')}}">
    <!-- Datepicker -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
    <!-- Timepicker -->
    <link rel="stylesheet" href="{{asset('vendor/timepicker/src/theme/jquery.timeselector.css')}}">
    <!-- Page transition-->
    <link rel="stylesheet" href="{{asset('vendor/page-transition/m-pagetransition-styles.css')}}">
    <!-- theme stylesheet -->
    <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    @yield('style')
    <!-- Tweaks for older IEs --><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="m-pagetransition">
      @include('includes.header')
      <div class="page-content">
        @yield('content')
      </div>
      @include('includes.footer')
    </div>
  </body>
  @include('includes.preloader')

  <!-- Jquery Latest -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 Latest-->
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Owl Carousel 2-->
  <script src="{{asset('vendor/owl.carousel2/owl.carousel.min.js')}}"></script>
  <!-- Lightbox 2 -->
  <script src="{{asset('vendor/lightbox2/js/lightbox.min.js')}}"></script>
  <!-- Page Transition-->
  <script src="{{asset('vendor/page-transition/m-pagetransition.js')}}"></script>
  <!-- Bootstrap Date Picker-->
  <script src="{{asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
  <!-- Bootstrap Select-->
  <script src="{{asset('vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
  <!-- Jquery Time Selector-->
  <script src="{{asset('vendor/timepicker/src/jquery.timeselector.js')}}"></script>
  <!-- Custom JS File-->
  <script src="{{asset('js/front.js')}}"></script>
  @yield('scripts')
  <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</html>
