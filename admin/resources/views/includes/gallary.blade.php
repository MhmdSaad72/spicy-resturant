<!-- Gallery Section-->
<section>
  <div class="container">
    <!-- Section heading-->
    <header class="bg-heading-text text-center mb-5" data-text="Gallery">
      <div class="index-forward">
        <p class="text-uppercase text-primary font-weight-bold small mb-2">Our gallery</p>
        <h2>Our gallery</h2>
      </div>
    </header>
    <div class="row pt-lg-5">
      @foreach ($album as $key => $item)

      <div class="col-lg-3 col-sm-6 px-2 px-sm-1 mb-2"><a class="gallery-item" href="{{asset('storage/' . $item->image)}}" data-lightbox="home-gallery" data-title="{{$item->title}}" style="background: url({{isset($item->image) ? asset('storage/' . $item->image) : asset('img/gallery-2-thumb.jpg')}})">
          <div class="gallery-item-overlay">
            <div class="gallery-item-overlay-title">
              <h5 class="mb-0">View image</h5>
              <p class="small mb-0">Click to open</p>
            </div>
          </div></a></div>
      @endforeach
      <div class="m-auto">
        <a class="btn btn-outline-light transition-link" href="{{route('gallery')}}">Discover more</a>
      </div>
    </div>
  </div>
</section>
