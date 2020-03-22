<!-- Opening hours section-->
<section class="py-0">
  <div class="container py-5 bg-dark">
    <div class="row p-4 align-items-center">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <!-- Section heading-->
        <header class="bg-heading-text text-center text-lg-left" data-text="Timing">
          <div class="index-forward">
            <p class="text-uppercase text-primary font-weight-bold small mb-2">{{$availability->title ?? ''}}</p>
            <h2>{{$availability->description ?? ''}}</h2>
          </div>
        </header>
      </div>
      <div class="col-lg-6 text-center text-lg-right">
          <div class="d-inline-block">
              <div class="d-flex align-items-center justify-content-center justify-content-lg-end mb-4 availability-block">
                <div class="text-right">
                  <p class="small text-uppercase text-muted mb-0">From</p>
                  <p class="h5 mb-2">{{isset($availability) ? $availability->getDayAttribute($start_day) : ''}}</p>
                  <p class="small text-muted mb-0">{{$availability->start_time ? \Carbon\Carbon::parse($availability->start_time)->format('h:i A') : ''}}</p>
                </div>
                <div class="pl-3"><i class="fas fa-clock fa-3x text-primary"></i></div>
                <div class="pl-3 text-left">
                  <p class="small text-uppercase text-muted mb-0">Until</p>
                  <p class="h5 mb-2">{{isset($availability) ? $availability->getDayAttribute($end_day) : ''}}</p>
                  <p class="small text-muted mb-0">{{$availability->end_time ? \Carbon\Carbon::parse($availability->end_time)->format('h:i A') : ''}}</p>
                </div>
              </div>
          </div>
          <br>
          <div class="d-inline-block">
              <div class="list-unstyled align-self-end text-center closed-block">
                  <span class="text-muted small text-uppercase">Closed on</span>
                  <ul class="list-inline mb-0">
                    @foreach ($closedDays as $key => $value)
                      <li class="list-inline-item h6 small text-white">{{$availability->getDayAttribute($value)}}</li>                      
                    @endforeach
                  </ul>
              </div>
          </div>
      </div>
    </div>
  </div>
</section>
