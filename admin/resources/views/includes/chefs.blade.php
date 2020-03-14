<!-- Chefs section-->
<section>
  <div class="container">
    <!-- Section heading-->
    <header class="bg-heading-text text-center mb-5" data-text="Chefs">
      <div class="index-forward">
        <p class="text-uppercase text-primary font-weight-bold small mb-2">{{$chefHead->title ?? ''}}</p>
        <h2>{{$chefHead->description ?? ''}}</h2>
      </div>
    </header>
    <div class="owl-carousel owl-theme chefs-slider owl-padding-sm">
      @foreach ($chefs as $key => $item)
        <div class="chefs-item"><img class="img-fluid d-block mx-auto" src="{{isset($item->image) ? asset('storage/' . $item->image) : asset('img/chef-1.jpg')}}" alt=""/>
        <div class="chef-info text-center p-4">
          <h3 class="h5 mb-1">{{$item->name}}</h3>
          <p class="small text-muted">{{$item->description}}</p>
          <ul class="list-inline mb-0">
            <li class="list-inline-item"><a class="social-link" href="{{$item->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a class="social-link" href="{{$item->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item"><a class="social-link" href="{{$item->instagram}}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
            <li class="list-inline-item"><a class="social-link" href="{{$item->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
