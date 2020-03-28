@extends('adminlte::page')

@section('title', 'Basic Reservation')

@section('content_header')
    <h1>Basic Reservation</h1>
@stop

@section('content')
  @if ($basicReserve)
  <div class="container">
      <div class="row">
          <div class="col-md-9">
              <div class="card">
                  <div class="card-body">
                      <a href="{{ url('/admin/basic-reservation/' . $basicReserve->id . '/edit') }}" title="Edit Basic Reservation"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <br/>
                      <br/>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th> Number of Tables </th><td> {{ $basicReserve->tables }} </td>
                            </tr>
                            <tr>
                              <th> Chairs for One Table</th><td> {{ $basicReserve->chairs }} </td>
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
