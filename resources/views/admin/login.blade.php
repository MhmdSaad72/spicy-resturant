<!DOCTYPE html>
<html>
  <head>
    <!-- Charset meta -->
    <meta charset="utf-8">
    <!-- IE compatibility meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Page title -->
    <title>Italiano Restaurant | Laravel Restaurant Template</title>
    <!-- Description meta -->
    <meta name="description" content="">
    <!-- Author meta -->
    <meta name="author" content="">
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
    <!-- Tweaks for older IEs --><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="m-pagetransition">
      <div class="page-content">
        <div class="admin-page-holder py-5 py-lg-0">
          <div class="row w-100">
            <div class="col-12">
              <!-- Section heading-->
              <header class="bg-heading-text text-center mb-2" data-text="login">
                <div class="index-forward">
                  <p class="text-uppercase text-primary font-weight-bold small mb-2">Admin panel access</p>
                  <h2>Dashboard login</h2>
                </div>
              </header>
              <p class="text-muted mb-5 text-center">Fill the fields below with your credentials to enter the admin panel.</p>
            </div>
            <div class="col-lg-5 mx-auto">
              <div class="card border-0 p-4 p-lg-0 mb-5">
                <div class="card-body bg-dark p-lg-5 position-relative">
                  <form class="login-form needs-validation" action="{{route('admin.login')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label class="label-required" for="email">Emaill address</label>
                      <input class="form-control form-control-lg" id="email" type="email" name="email" placeholder="Email address e.g. Jason@mail.com" value="{{ old('email') }}">
                      @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                      @enderror
                      @if (session('emailError'))
                        <div class="invalid-feedback kh d-block">{{ session('emailError') }}</div>
                      @endif
                    </div>
                    <div class="form-group">
                      <label class="label-required" for="password">Password</label>
                      <input class="form-control form-control-lg" id="password" type="password" name="password" placeholder="Enter your password" >
                      @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group pt-2">
                      <button class="btn btn-primary btn-block" type="submit"> <i class="fas fa-door-open mr-2"></i>Login now</button>
                    </div>
                    <div class="form-group mb-0 text-muted d-flex align-items-center justify-content-between flex-wrap">
                      <div class="custom-control custom-checkbox mr-2">
                        <input class="custom-control-input" id="rememberMe" type="checkbox">
                        <label class="custom-control-label" for="rememberMe" {{ old('remember') ? 'checked' : '' }}>Remember me</label>
                      </div>
                      @if (Route::has('password.request'))
                          <a class="btn btn-link p-0 btn-sm mt-3" href="{{ route('password.request') }}">
                              {{ __('Forgot Your Password?') }}
                          </a>
                      @endif
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <p class="small text-muted mb-0 admin-copyrights-text text-center">&copy; 2020 All rights reserved. Italiano.com</p>
        </div>
      </div>
      <div class="style-switcher" id="style-switch">
        <button type="button" id="style-switch-button"><i class="fa fa-palette"></i></button>
        <h5 class="mb-1">Customize your theme</h5>
        <p class="small text-muted font-weight-light mb-4">Stylesheet switching is done via JavaScript and can cause a blink while page loads. This will not happen in your production code.</p>
        <div class="mb-2">
          <h6 class="small">Pick your font style</h6>
          <div class="toggle-switcher mb-4">
            <input type="checkbox" name="demoFont" id="demoFont">
            <label class="toggle-switcher-label" for="demoFont">
              <div class="span span-left">Aclonica</div>
              <div class="span span-right">Surfer</div>
            </label>
          </div>
        </div>
        <div class="mb-2">
          <h6 class="small">Choose rounded or sharp corners</h6>
          <div class="toggle-switcher mb-4">
            <input type="checkbox" name="demoRounded" id="demoRounded">
            <label class="toggle-switcher-label" for="demoRounded">
              <div class="span span-left">Sharp</div>
              <div class="span span-right">Rounded</div>
            </label>
          </div>
        </div>
        <div class="mb-4">
          <h6 class="small">Choose between light &amp; Dark</h6>
          <div class="toggle-switcher mb-4">
            <input type="checkbox" name="demoTheme" id="demoTheme">
            <label class="toggle-switcher-label" for="demoTheme">
              <div class="span span-left">Light</div>
              <div class="span span-right">Dark</div>
            </label>
          </div>
        </div>
        <div class="mb-4">
          <h6 class="small">Pick your desired color</h6>
          <div class="theme-color-pallete">
            <div class="row px-3">
              <div class="col-4 p-1">
                <label class="theme-color-label red" for="themeRed">Red</label>
                <input type="radio" name="themecolor" id="themeRed" data-theme-path="css/style.red.css" data-theme-color="red">
              </div>
              <div class="col-4 p-1">
                <label class="theme-color-label blue" for="themeBlue">Blue</label>
                <input type="radio" name="themecolor" id="themeBlue" data-theme-path="css/style.blue.css" data-theme-color="blue">
              </div>
              <div class="col-4 p-1">
                <label class="theme-color-label pink" for="themePink">Pink</label>
                <input type="radio" name="themecolor" id="themePink" data-theme-path="css/style.pink.css" data-theme-color="pink">
              </div>
              <div class="col-4 p-1">
                <label class="theme-color-label green" for="themeGreen">Green</label>
                <input type="radio" name="themecolor" id="themeGreen" data-theme-path="css/style.green.css" data-theme-color="green">
              </div>
              <div class="col-4 p-1">
                <label class="theme-color-label sea" for="themeSea">Sea</label>
                <input type="radio" name="themecolor" id="themeSea" data-theme-path="css/style.sea.css" data-theme-color="sea">
              </div>
              <div class="col-4 p-1">
                <label class="theme-color-label yellow" for="themeYellow">Yellow</label>
                <input type="radio" name="themecolor" id="themeYellow" data-theme-path="css/style.default.css" data-theme-color="default">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
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
  <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</html>
