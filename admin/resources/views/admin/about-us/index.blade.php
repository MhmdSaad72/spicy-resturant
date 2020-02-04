@extends('adminlte::page')

@section('title', 'About Us')

@section('content_header')
    <h1>About Us</h1>
@stop

@section('content')
  @if ($aboutus)
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      <a href="{{ url('/admin/about-us/' . $aboutus->id . '/edit') }}" title="Edit About Us"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <br/>
                      <br/>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th> Title </th><td> {{ $aboutus->title }} </td>
                            </tr>
                            <tr>
                              <th> Description </th><td> {{ $aboutus->description }} </td>
                            </tr>
                            <tr>
                              <th> Content </th><td> {{ $aboutus->content }} </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endif
@endsection
