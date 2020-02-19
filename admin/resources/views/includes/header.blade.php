  <!-- Navbar top-->
  <nav class="navbar navbar-expand-lg py-4" id="navTop">
    <div class="container d-flex justify-content-between align-items-center">
      <!-- Hotline button--><a class="d-flex align-items-center reset-anchor" href="tel:+29870988764">
        <div class="nav-icon-rounded"><i class="fas fa-phone"></i></div>
        <div class="ml-2 d-none d-lg-block">
          <p class="small text-gray mb-0">Our hotline</p>
          <h6 class="line-height-sm mb-0">{{isset($basicDetail) ? $basicDetail->hot_line : ''}}</h6>
        </div></a>
      <!-- Navabr brand--><a class="navbar-brand m-0 transition-link" href="index.html"><img src="{{asset('storage/' . $basicDetail->logo)}}" alt="Italiano Restaurant" width="145"></a>
      <!-- Make reservation button--><a class="d-flex align-items-center reset-anchor transition-link" href="booking.html">
        <div class="mr-2 text-right d-none d-lg-block">
          <p class="small text-gray mb-0">Want a table?</p>
          <h6 class="line-height-sm mb-0">{{isset($basicDetail) ? $basicDetail->reservation : ''}}</h6>
        </div>
        <div class="nav-icon-rounded"><i class="fas fa-calendar-minus"></i></div></a>
    </div>
  </nav>
