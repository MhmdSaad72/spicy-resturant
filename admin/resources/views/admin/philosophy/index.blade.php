@extends('adminlte::page')

@section('title', 'Philosophy')

@section('content_header')
    <h1>Philosophy</h1>
@stop

@section('content')
  @if ($philosophy)
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      <a href="{{ url('/admin/philosophy/' . $philosophy->id . '/edit') }}" title="Edit Philosophy"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <br/>
                      <br/>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th> Title </th><td> {{ $philosophy->title }} </td>
                            </tr>
                            <tr>
                              <th> Description </th><td> {{ $philosophy->description }} </td>
                            </tr>
                            <tr>
                              <th> Content </th><td> {{ $philosophy->content }} </td>
                            </tr>
                            <tr>
                              <th> Name </th><td> {{ $philosophy->name }} </td>
                            </tr>
                            <tr>
                              <th> Position </th><td> {{ $philosophy->position }} </td>
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
