<footer class="page-footer py-5 bg-dark">
  <div class="container py-5 text-center">
    <div class="row">
      <div class="col-lg-6 mx-auto"><a href="{{route('home.index')}}"><img class="mb-3" src="{{isset($basicDetail->footer_logo) ? asset('storage/' . $basicDetail->footer_logo) : ''}}" alt="" width="145"></a>
        <p class="text-muted">{{isset($basicDetail) ? $basicDetail->content : ''}}</p>
        <ul class="list-inline text-white mb-3">
          <li class="list-inline-item"><a class="reset-anchor h6" href="{{route('home.index')}}">Home</a></li>
          <li class="list-inline-item"><a class="reset-anchor h6" href="{{route('about.index')}}">About</a></li>
          <li class="list-inline-item"><a class="reset-anchor h6" href="{{route('menus.index')}}">Menu</a></li>
          <li class="list-inline-item"><a class="reset-anchor h6" href="{{route('contact.show')}}">Contact</a></li>
          <li class="list-inline-item"><a class="reset-anchor h6" href="#">Features</a></li>
        </ul>
        <p class="text-muted text-small mb-0">Copyright &copy; {{\Carbon\Carbon::now()->format('Y')}} {{isset($basicDetail) ? $basicDetail->name : ''}}. All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>
