<!-- Navbar bottom-->
<nav class="navbar navbar-expand-lg navbar-light nav-bottom" id="navBottom">
  <div class="container py-2 position-relative px-3 bg-dark">
    <!-- Navbar mobile toggler-->
    <button class="navbar-toggler navbar-toggler-right px-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span></span><span></span><span></span></button>
    <!-- Admin List-->
    <ul class="admin-list list-unstyled mb-0 d-flex align-items-start align-items-lg-center py-3">
      <li class="m-0"> <a class="reset-anchor search-btn" id="toggleSearch" href="#"><i class="fas fa-search"></i><i class="fas fa-times-circle d-none"></i></a></li>
      <li class="text-muted mx-2 px-1">| </li>
      <li class="m-0"><a class="reset-anchor transition-link" href="login.html"><i class="fas fa-user-circle"></i></a></li>
      <li class="text-muted mx-2 px-1">| </li>
      <li class="m-0"><a class="media reset-anchor align-items-center transition-link" href="admin-bookings.html">
          <div class="position-relative"><i class="fas fa-calendar-minus text-light"></i>
            <div class="booking-counter-number">2</div>
          </div>
          <div class="ml-2">
            <p class="small mb-0">bookings</p>
          </div></a></li>
    </ul>
    <!-- Navabr brand--><a class="navbar-brand d-none position-absolute" href="index.html"><img src="{{isset($basicDetail->logo) ? asset('storage/' . $basicDetail->logo) : ''}}" alt="Italiano Restaurant" width="100"></a>
    <!-- Navbar menu-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <!-- Navbar link--><a class="nav-link transition-link active" href="{{route('home.index')}}">Home</a>
        </li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navMenuPages" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
          <div class="dropdown-menu navSlideIn animate" aria-labelledby="navMenuPages"><a class="dropdown-item transition-link" href="{{route('menus.index')}}">Menu style 1</a><a class="dropdown-item transition-link" href="{{route('menus.show')}}">Menu style 2</a></div>
        </li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navAboutPages" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a>
          <div class="dropdown-menu navSlideIn animate" aria-labelledby="navAboutPages"><a class="dropdown-item transition-link" href="{{route('about.index')}}">About style 1</a><a class="dropdown-item transition-link" href="{{route('about.show')}}">About style 2</a></div>
        </li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navContactPages" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact</a>
          <div class="dropdown-menu navSlideIn animate" aria-labelledby="navContactPages"><a class="dropdown-item transition-link" href="{{route('contact.show')}}">Contact style 1</a><a class="dropdown-item transition-link" href="{{route('contact.index')}}">Contact style 2</a></div>
        </li>
        <li class="nav-item dropdown megamenu"><a class="nav-link dropdown-toggle" id="megamneu" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
          <div class="dropdown-menu navSlideIn animate p-4" aria-labelledby="megamneu">
            <div class="container">
              <div class="row">
                <div class="col-lg-4 mb-4">
                  <h6>Sitemap</h6>
                  <div class="d-flex flex-column flex-lg-row">
                    <ul class="list-unstyled mr-lg-4">
                      <li><a class="dropdown-item border-0 transition-link" href="index.html">Home</a></li>
                      <li><a class="dropdown-item border-0 transition-link" href="about-1.html">About us one</a></li>
                      <li><a class="dropdown-item border-0 transition-link" href="about-2.html">About us two</a></li>
                      <li><a class="dropdown-item border-0 transition-link" href="menu-1.html">Our menu one</a></li>
                      <li><a class="dropdown-item border-0 transition-link" href="menu-2.html">Our menu two</a></li>
                    </ul>
                    <ul class="list-unstyled">
                      <li><a class="dropdown-item border-0 transition-link" href="contact-1.html">Contact one</a></li>
                      <li><a class="dropdown-item border-0 transition-link" href="contact-2.html">Contact two</a></li>
                      <li><a class="dropdown-item border-0 transition-link" href="booking.html">Book a table</a></li>
                      <li><a class="dropdown-item border-0 transition-link" href="404.html">Error 404</a></li>
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
                      <li><a class="dropdown-item border-0 transition-link" href="admin-bookings.html">My bookings</a></li>
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
                      <li><a class="dropdown-item border-0 transition-link" href="category.html">Categories</a></li>
                      <li><a class="dropdown-item border-0 transition-link" href="typography.html">Typography</a></li>
                      <li><a class="dropdown-item border-0 transition-link" href="cancelled.html">Booking cancelled</a></li>
                    </ul>
                    <ul class="list-unstyled">
                      <li><a class="dropdown-item border-0 transition-link" href="booking-confirmation.html">Booking receipt</a></li>
                      <li><a class="dropdown-item border-0 transition-link" href="booking-cancellation.html">Booking Cancellation</a></li>
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
  <form class="search-form" action="search-results.html">
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
