@extends('adminlte::page')

@section('title', 'Our Story')

@section('content_header')
    <h1>Our Story</h1>
@stop

@section('content')
  @if ($ourstory)
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  <a class="btn btn-primary" href="{{ url('/admin/our-story/' . $ourstory->id . '/edit') }}" title="Edit Our Story"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>

                  <br>
                  <br>

                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th> Title </th><td> {{ $ourstory->title }} </td>
                        </tr>
                        <tr>
                          <th> Description </th><td> {{ $ourstory->description }} </td>
                        </tr>
                        <tr>
                          <th> Content </th><td> {{ $ourstory->content }} </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endif
@endsection
