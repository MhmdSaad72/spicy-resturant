@extends('adminlte::page')

@section('title', 'Edit Service')

@section('content_header')
    <h1>Edit Service</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/admin/service') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        {{-- @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif --}}

                        <form method="POST" action="{{ url('/admin/service/' . $service->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.service.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('js')
  <script src="{{ asset('js/bootstrap-filestyle.min.js') }}"></script>

  <script type="text/javascript">
  $(function () {
      /* ==========================================
         CUSTOM FILE UPLOAD
      ============================================ */
      $(":file").filestyle({
          buttonBefore: true,
          btnClass: "btn-dark",
          placeholder: "No file chosen"
      });
  });
  </script>
@endsection --}}
