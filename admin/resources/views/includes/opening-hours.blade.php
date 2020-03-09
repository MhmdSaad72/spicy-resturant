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
      <div class="col-lg-6">
        <div class="d-flex align-items-center justify-content-center justify-content-lg-end">
          <div class="text-right">
            <p class="small text-uppercase text-muted mb-0">From</p>
            <p class="h5 mb-2">{{isset($availability->start_day) ? $availability->getDayAttribute($availability->start_day) : ''}}</p>
            <p class="small text-muted mb-0">{{$availability->start_time ? \Carbon\Carbon::parse($availability->start_time)->format('h:i A') : ''}}</p>
          </div>
          <div class="pl-3"><i class="fas fa-clock fa-3x text-primary"></i></div>
          <div class="pl-3">
            <p class="small text-uppercase text-muted mb-0">Until</p>
            <p class="h5 mb-2">{{isset($availability->end_day) ? $availability->getDayAttribute($availability->end_day) : ''}}</p>
            <p class="small text-muted mb-0">{{$availability->end_time ? \Carbon\Carbon::parse($availability->end_time)->format('h:i A') : ''}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
