@extends('adminlte::page')

@section('title', 'Restaurant capacity')

@section('content_header')
    <h1 class="mb-2">Restaurant capacity</h1>
    <div class="row">
        <div class="col-lg-7">
            <p class="text-gray text-small font-weight-light">Restaurant capacity shows how many tables and how many chairs exist in the restaurant, this information is important for booking actions.</p>
        </div>
    </div>
@stop

@section('content')
  @if ($basicReserve)
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  <a href="{{ url('/admin/basic-reservation/' . $basicReserve->id . '/edit') }}" title="Edit Basic Reservation"><button class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

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
@endif
@endsection
