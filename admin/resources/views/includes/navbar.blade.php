<?php  $navDark = isset($heroDark) ? 'bg-dark bg-pattern' : '' ;
 $home = isset($home) ? 'active' : '' ;
 $menu = isset($menu) ? 'active' : '' ;
 $about = isset($about) ? 'active' : '';
 $contact = isset($contact) ? 'active' : '' ; ?>
<header class="header bg-pattern {{$navDark}}">
    <!-- Navbar top-->
    <nav class="navbar navbar-expand-lg py-4" id="navTop">
      <div class="container d-flex justify-content-between align-items-center">
        <!-- Hotline button--><a class="d-flex align-items-center reset-anchor" href="tel:{{isset($basicDetail->hot_line) ? $basicDetail->hot_line : ''}}">
          <div class="nav-icon-rounded"><i class="fas fa-phone"></i></div>
          <div class="ml-2 d-none d-lg-block">
            <p class="small text-gray mb-0">Our hotline</p>
            <h6 class="line-height-sm mb-0">{{isset($basicDetail->hot_line) ? $basicDetail->hot_line : ''}}</h6>
          </div></a>
        <!-- Navabr brand--><a class="navbar-brand m-0 transition-link" href="index.html"><img src="{{isset($basicDetail->logo) ? asset('storage/' . $basicDetail->logo) : ''}}" alt="Italiano Restaurant" width="145"></a>
        <!-- Make reservation button--><a class="d-flex align-items-center reset-anchor transition-link" href="{{route('booking.index')}}">
          <div class="mr-2 text-right d-none d-lg-block">
            <p class="small text-gray mb-0">Want a table?</p>
            <h6 class="line-height-sm mb-0">{{isset($basicDetail->reservation) ? $basicDetail->reservation : ''}}</h6>
          </div>
          <div class="nav-icon-rounded"><i class="fas fa-calendar-minus"></i></div></a>
      </div>
    </nav>
    <!-- Navbar bottom-->
    <nav class="navbar navbar-expand-lg navbar-light nav-bottom" id="navBottom">
        <div class="container py-2 position-relative px-3 bg-dark">
            <!-- Navbar mobile toggler-->
            <button class="navbar-toggler navbar-toggler-right px-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span></span><span></span><span></span></button>
            <!-- Admin List-->
            @auth
             <ul class="admin-list list-unstyled mb-0 d-flex align-items-start align-items-lg-center py-3">
                <li class="m-0">
                    <a class="reset-anchor search-btn" id="toggleSearch" href="#">
                        <i class="fas fa-search"></i>
                        <i class="fas fa-times-circle d-none"></i>
                    </a>
                </li>
                <li class="text-muted mx-2 px-1">| </li>
                <li class="dropdown m-0 py-lg-3">
                    <a class="reset-anchor dropdown-toggle no-caret" id="adminPages" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <div class="dropdown-menu mt-lg-0 dropdown-menu-center always-animated" aria-labelledby="adminPages">

                        <a class="dropdown-item transition-link" href="{{route('personal.information' , ['id' => Auth::user()->id])}}">
                          <h6 class="mb-0 text-white">{{Auth::user()->name}}</h6>
                          <p class="small mb-0">{{Auth::user()->email}}</p>
                        </a>
                        <a class="dropdown-item transition-link" href="{{route('personal.information' , ['id' => Auth::user()->id])}}">Personal information</a>
                        <a class="dropdown-item transition-link" href="{{route('booking.bookings')}}">My bookings</a>
                        <a class="dropdown-item transition-link" href="{{route('personal.review' , ['id' => Auth::user()->id])}}">My review</a>
                        <a class="dropdown-item transition-link" href="{{route('logout')}}"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                <li class="text-muted mx-2 px-1">| </li>
                <li class="m-0">
                    <a class="media reset-anchor align-items-center transition-link" href="{{route('booking.bookings')}}">
                    <div class="position-relative">
                        <i class="fas fa-calendar-minus text-light"></i>
                        <div class="booking-counter-number">{{$bookings ?? 0}}</div>
                    </div>
                    <div class="ml-2">
                        <p class="small mb-0">bookings</p>
                    </div></a></li>
                </ul>
              @else
                <!-- Admin List If Unregistered-->
                <ul class="admin-list list-unstyled mb-0 d-flex align-items-start align-items-lg-center py-3">
                    <li class="m-0">
                        <a href="{{route('login')}}" class="reset-anchor d-flex align-items-center transition-link">
                            <i class="fas fa-door-open mr-2 text-primary"></i>
                            <p class="small mb-0">Login</p>
                        </a>
                    </li>
                </ul>
                @endauth


                <!-- Navabr brand--><a class="navbar-brand d-none position-absolute" href="{{route('home.index')}}"><img src="{{isset($basicDetail->logo) ? asset('storage/' . $basicDetail->logo) : ''}}" alt="Italiano Restaurant" width="100"></a>
                <!-- Navbar menu-->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <!-- Navbar link--><a class="nav-link transition-link {{$home}}" href="{{route('home.index')}}">Home</a>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle {{$menu}}" id="navMenuPages" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                            <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navMenuPages"><a class="dropdown-item transition-link" href="{{route('menus.index')}}">Menu style 1</a><a class="dropdown-item transition-link" href="{{route('menus.show')}}">Menu style 2</a></div>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle {{$about}}" id="navAboutPages" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a>
                            <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navAboutPages"><a class="dropdown-item transition-link" href="{{route('about.index')}}">About style 1</a><a class="dropdown-item transition-link" href="{{route('about.show')}}">About style 2</a></div>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle {{$contact}}" id="navContactPages" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact</a>
                            <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navContactPages"><a class="dropdown-item transition-link" href="{{route('contact.show')}}">Contact style 1</a><a class="dropdown-item transition-link" href="{{route('contact.index')}}">Contact style 2</a></div>
                        </li>
                        <li class="nav-item dropdown megamenu"><a class="nav-link dropdown-toggle" id="megamneu" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                            <div class="dropdown-menu dropdown-menu-center p-4" aria-labelledby="megamneu">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4 mb-4">
                                            <h6>Sitemap</h6>
                                            <div class="d-flex flex-column flex-lg-row">
                                                <ul class="list-unstyled mr-lg-4">
                                                    <li><a class="dropdown-item border-0 transition-link" href="{{route('home.index')}}">Home</a></li>
                                                    <li><a class="dropdown-item border-0 transition-link" href="{{route('about.index')}}">About us one</a></li>
                                                    <li><a class="dropdown-item border-0 transition-link" href="{{route('about.show')}}">About us two</a></li>
                                                    <li><a class="dropdown-item border-0 transition-link" href="{{route('menus.index')}}">Our menu one</a></li>
                                                    <li><a class="dropdown-item border-0 transition-link" href="{{route('menus.show')}}">Our menu two</a></li>
                                                </ul>
                                                <ul class="list-unstyled">
                                                    <li><a class="dropdown-item border-0 transition-link" href="{{route('contact.show')}}">Contact one</a></li>
                                                    <li><a class="dropdown-item border-0 transition-link" href="{{route('contact.index')}}">Contact two</a></li>
                                                    <li><a class="dropdown-item border-0 transition-link" href="{{route('booking.index')}}">Book a table</a></li>
                                                    {{-- <li><a class="dropdown-item border-0 transition-link" href="404.html">Error 404</a></li> --}}
                                                    <li><a class="dropdown-item border-0 transition-link" href="dish.html">Dish detail</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <h6>My Account</h6>
                                            <div class="d-flex flex-column flex-lg-row">
                                                <ul class="list-unstyled mr-lg-4">
                                                    <li><a class="dropdown-item border-0 transition-link" href="admin-personal.html">Personal information</a></li>
                                                    <li><a class="dropdown-item border-0 transition-link" href="admin-edit-personal.html">Edit personal info</a></li>
                                                    <li><a class="dropdown-item border-0 transition-link" href="{{route('booking.bookings')}}">My bookings</a></li>
                                                    <li><a class="dropdown-item border-0 transition-link" href="admin-reviews.html">My reviews</a></li>
                                                    <li><a class="dropdown-item border-0 transition-link" href="admin-pass-change.html">Change password</a></li>
                                                </ul>
                                                <ul class="list-unstyled">
                                                    <li><a class="dropdown-item border-0 transition-link" href="login.html">Login</a></li>
                                                    <li><a class="dropdown-item border-0 transition-link" href="register.html">Create account</a></li>
                                                    <li><a class="dropdown-item border-0 transition-link" href="verfication-code.html">Verify account</a></li>
                                                    <li><a class="dropdown-item border-0 transition-link" href="verified.html">Account verified</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <h6>Other pages</h6>
                                            <div class="d-flex flex-column flex-lg-row">
                                                <ul class="list-unstyled mr-lg-4">
                                                    <li><a class="dropdown-item border-0 transition-link" href="search-results.html">Search results</a></li>
                                                    <li><a class="dropdown-item border-0 transition-link" href="{{route('categories.page')}}">Categories</a></li>
                                                    <li><a class="dropdown-item border-0 transition-link" href="typography.html">Typography</a></li>
                                                    <li><a class="dropdown-item border-0 transition-link" href="cancelled.html">Booking cancelled</a></li>
                                                </ul>
                                                <ul class="list-unstyled">
                                                    <li><a class="dropdown-item border-0 transition-link" href="https://italianolight.netlify.com">Light theme</a></li>
                                                    <li><a class="dropdown-item border-0 transition-link" href="#">Buy theme</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <h6>New dishes</h6>
                                        <p class="small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        <div class="row">
                                            <div class="col-lg-4 mb-4 mb-lg-0">
                                                <!-- Related dishes item--><a class="media align-items-center reset-anchor transition-link" href="dish.html"><img class="img-fluid" src="img/signature-slide-1.png" alt="Bucatini" width="100"/>
                                                <div class="media-body ml-3">
                                                    <h6>Bucatini</h6>
                                                    <p class="text-muted small mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                                    <p class="price h6 text-primary mb-0">$5.70</p>
                                                </div></a>
                                            </div>
                                            <div class="col-lg-4 mb-4 mb-lg-0">
                                                <!-- Related dishes item--><a class="media align-items-center reset-anchor transition-link" href="dish.html"><img class="img-fluid" src="img/signature-slide-2.png" alt="Canellonni" width="100"/>
                                                <div class="media-body ml-3">
                                                    <h6>Canellonni</h6>
                                                    <p class="text-muted small mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                                    <p class="price h6 text-primary mb-0">$5.70</p>
                                                </div></a>
                                            </div>
                                            <div class="col-lg-4 mb-4 mb-lg-0">
                                                <!-- Related dishes item--><a class="media align-items-center reset-anchor transition-link" href="dish.html"><img class="img-fluid" src="img/signature-slide-3.png" alt="Margherita" width="100"/>
                                                <div class="media-body ml-3">
                                                    <h6>Margherita</h6>
                                                    <p class="text-muted small mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                                    <p class="price h6 text-primary mb-0">$5.70</p>
                                                </div></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Search form -->
            <form class="search-form" action="{{route('search')}}">
                <div class="container p-2">
                    <div class="d-flex">
                        <div class="form-group mb-0 w-100 position-relative">
                            <input class="form-control bg-none border-0 pr-5" type="search" name="search" placeholder="What're you searchig for">
                            <button class="btn btn-link p-0" type="submit"><i class="fas fa-search text-light"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </nav>

</header>
