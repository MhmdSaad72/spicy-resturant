@extends('adminlte::page')

@section('title', 'Availability Section')

@section('content_header')
    <h1>Availability Section</h1>
@stop

@section('content')
  @if ($availability)
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  <a class="btn btn-primary" href="{{ url('/admin/availability/' . $availability->id . '/edit') }}" title="Edit Availability"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>

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
                          <th> Availability Days </th><td> <ul class="list-inline">
                            @foreach ($availableDays as $key => $value)
                              <li class="list-inline-item">{{$availability->getDayAttribute($value)}}</li>
                            @endforeach
                          </ul> </td>
                        </tr>
                        <tr>
                          <th> Start Time </th><td> {{ $availability->start_time }} </td>
                        </tr>
                        <tr>
                          <th> End Time </th><td> {{ $availability->end_time }} </td>
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
