@extends('adminlte::page')

@section('title', 'Availability')

@section('content_header')
    <h1>Availability</h1>
@stop

@section('content')
  @if ($availability)
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      <a href="{{ url('/admin/availability/' . $availability->id . '/edit') }}" title="Edit Availability"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <br/>
                      <br/>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th> Title </th><td> {{ $availability->title }} </td>
                            </tr>
                            <tr>
                              <th> Description </th><td> {{ $availability->description }} </td>
                            </tr>
                            <tr>
                              <th> Start Date </th><td> {{ $availability->start_date }} </td>
                            </tr>
                            <tr>
                              <th> End Date </th><td> {{ $availability->end_date }} </td>
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
