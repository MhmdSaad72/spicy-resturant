@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
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
@endsection

@section('content')
  <section>
      <div class="container">
          <!-- Section heading-->
          <header class="bg-heading-text mb-5" data-text="Statistics">
              <div class="index-forward">
                  <p class="text-uppercase text-primary font-weight-bold small mb-2">Statistics</p>
                  <h1 class="text-dark">Dashboard</h1>
              </div>
          </header>
          <div class="row">
              <div class="col-lg-6">
                  <div class="mb-4">
                      <!-- Dashboard Card-->
                      <div class="card border-0 overflow-hidden p-4 p-lg-0">
                          <div class="card-body p-lg-5">
                              <h2 class="h1 mb-0 text-dark">{{$userCount}}</h2>
                              <p class="text-muted mb-0">Registered users</p>
                              <i class="dash-card-icon fas fa-user"></i>
                              <div class="pt-2">
                                  <a class="btn btn-link p-0 btn-arrow" href="{{route('clients')}}">
                                      <span>View details</span>
                                      <i class="fas fa-long-arrow-alt-right"></i>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="mb-4">
                      <!-- Dashboard Card-->
                      <div class="card border-0 overflow-hidden p-4 p-lg-0">
                          <div class="card-body p-lg-5">
                              <h2 class="h1 mb-0 text-dark">{{$bookingCount}}</h2>
                              <p class="text-muted mb-0">Confirmed bookings</p>
                              <i class="dash-card-icon fas fa-calendar-minus"></i>
                              <div class="pt-2">
                                  <a class="btn btn-link p-0 btn-arrow" href="{{route('bookings.index')}}">
                                      <span>View details</span>
                                      <i class="fas fa-long-arrow-alt-right"></i>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6 mb-4">
                  <!-- Dashboard Chart Card-->
                  <div class="card border-0 overflow-hidden p-4 p-lg-0">
                      <div class="card-body p-lg-5">
                          <h2 class="h4 text-dark">New visitors</h2>
                          <p class="text-small text-muted mb-5">Trach new visitors for this week</p>
                          <!-- Visitors Chart-->
                          <canvas id="visitorsChart"></canvas>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-12 mb-4">
                  <!-- Dashboard Full Card-->
                  <div class="card border-0 overflow-hidden p-4 p-lg-0">
                      <div class="card-body p-lg-5">
                          <div class="row align-items-center text-center text-lg-left">
                              <div class="col-lg-4">
                                  <h2 class="h4 mb-0 text-dark">Total reviews</h2>
                              </div>
                              <div class="col-lg-4 text-center py-2 py-lg-0">
                                  <p class="text-muted mb-0">Based on {{$reviewCount}} reviews</p>
                              </div>
                              <div class="col-lg-4">
                                  <div class="d-flex align-items-center justify-content-center justify-content-lg-end">
                                      <h6 class="mb-0 mr-3 text-dark">{{$reviewAverage}}</h6>
                                     {!! $reviews !!}
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-4 mb-4">
                  <!-- Dashboard Card-->
                  <div class="card border-0 overflow-hidden p-4 p-lg-0">
                      <div class="card-body p-lg-5">
                          <h2 class="h1 mb-0 text-dark">{{$disheCount}}</h2>
                          <p class="text-muted mb-0">Original Dishes</p>
                          <i class="dash-card-icon fas fa-hamburger"></i>
                          <div class="pt-2">
                              <a class="btn btn-link p-0 btn-arrow" href="{{route('slide-menu.index')}}">
                                  <span>View details</span>
                                  <i class="fas fa-long-arrow-alt-right"></i>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 mb-4">
                  <!-- Dashboard Card-->
                  <div class="card border-0 overflow-hidden p-4 p-lg-0">
                      <div class="card-body p-lg-5">
                          <h2 class="h1 mb-0 text-dark">14</h2>
                          <p class="text-muted mb-0">Hardworking employees</p>
                          <i class="dash-card-icon fas fa-users-cog"></i>
                          <div class="pt-2">
                              <a class="btn btn-link p-0 btn-arrow" href="#">
                                  <span>View details</span>
                                  <i class="fas fa-long-arrow-alt-right"></i>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 mb-4">
                  <!-- Dashboard Card-->
                  <div class="card border-0 overflow-hidden p-4 p-lg-0">
                      <div class="card-body p-lg-5">
                          <h2 class="h1 mb-0 text-dark">{{$brancheCount}}</h2>
                          <p class="text-muted mb-0">Global branches</p>
                          <i class="dash-card-icon fas fa-globe-americas"></i>
                          <div class="pt-2">
                              <a class="btn btn-link p-0 btn-arrow" href="{{route('branch-body.index')}}">
                                  <span>View details</span>
                                  <i class="fas fa-long-arrow-alt-right"></i>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-6 mb-4">
                  <!-- Dashboard Chart Card-->
                  <div class="card border-0 overflow-hidden p-4 p-lg-0">
                      <div class="card-body p-lg-5">
                          <h2 class="h4 text-dark">Week bookings</h2>
                          <p class="text-small text-muted mb-5">Trach the active and cancelled bookings of this week</p>
                          <!-- Bookings Chart-->
                          <canvas id="bookingChart"></canvas>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="mb-4">
                      <!-- Dashboard Card-->
                      <div class="card border-0 overflow-hidden p-4 p-lg-0">
                          <div class="card-body p-lg-5">
                              <h2 class="h1 mb-0 text-dark">{{$tableCount ?? 0}}</h2>
                              <p class="text-muted mb-0">Restful tables</p>
                              <i class="dash-card-icon fas fa-chair"></i>
                              <div class="pt-2">
                                  <a class="btn btn-link p-0 btn-arrow" href="{{route('reservation.view')}}">
                                      <span>View details</span>
                                      <i class="fas fa-long-arrow-alt-right"></i>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="mb-4">
                      <!-- Dashboard Card-->
                      <div class="card border-0 overflow-hidden p-4 p-lg-0">
                          <div class="card-body p-lg-5">
                              <h2 class="h1 mb-0 text-dark">{{$galleryCount}}</h2>
                              <p class="text-muted mb-0">Gallery images</p>
                              <i class="dash-card-icon fas fa-images"></i>
                              <div class="pt-2">
                                  <a class="btn btn-link p-0 btn-arrow" href="{{route('album.index')}}">
                                      <span>View details</span>
                                      <i class="fas fa-long-arrow-alt-right"></i>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <!-- Dashboard Card-->
              <div class="col-lg-6 mb-4">
                  <div class="card border-0 overflow-hidden p-4 p-lg-0">
                      <div class="card-body p-lg-5">
                          <h2 class="h4 text-dark">Latest review</h2>
                          <p class="text-small text-muted mb-4">Lorem ipsum dolor sit amet.</p>
                          <!-- Dashboard Latest review-->
                          <div class="row">
                              <div class="col-lg-7 mb-3">
                                  <div class="media">
                                      <i class="fas fa-quote-left text-primary fa-2x"></i>
                                      <div class="media-body ml-3">
                                          <h3 class="h5 mb-0 text-dark">{{$latestReview->user->name}}</h3>
                                          <p class="text-gray small mb-0">{{\Carbon\Carbon::parse($latestReview->created_at)->format('d M Y')}}  </p>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-5 text-lg-right">
                                {!! $latestReview->stars !!}
                              </div>
                          </div>
                          <p class="text-small text-muted mb-1">{{$latestReview->reviewBody}}</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6 mb-4">
                  <!-- Dashboard Card-->
                  <div class="card border-0 overflow-hidden p-4 p-lg-0">
                      <div class="card-body p-lg-5">
                          <h2 class="h4 text-dark">Top rated dish</h2>
                          <p class="text-small text-muted mb-4">Lorem ipsum dolor sit amet.</p>
                          <div class="row align-items-center">
                              <div class="col-sm-4 mb-4 mb-lg-0">
                                  <img class="rounded-circle img-fluid" src="{{asset('storage/' . $topDishReview->image)}}" alt="Carbonara">
                              </div>
                              <div class="col-sm-8">
                                  <div class="d-flex flex-wrap flex-column flex-lg-row justify-content-lg-between">
                                      <h5 class="mb-0 mr-2">
                                          <a class="reset-anchor text-dark" href="#">{{$topDishReview->title}}</a>
                                      </h5>
                                      {!! $topDishReview->rate !!}
                                  </div>
                                  <p class="text-small text-muted mb-3">{{$topDishReview->str_limit($topDishReview->content)}}</p>
                                  <p class="price h6 text-primary mb-0">${{$topDishReview->afterDiscount()}}</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

@endsection
@section('js')
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
  <!-- Chart.js configuration -->
  <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('js/charts/charts-config.js')}}"></script>
  <script src="{{asset('js/charts/visitors.chart.js')}}"></script>
  <script src="{{asset('js/charts/bookings.chart.js')}}"></script>
  <script>
  $.getJSON("chart/booking", function (incomeChartJson) {
    alert(incomeChartJson);
  });
  </script>
  <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
@endsection
