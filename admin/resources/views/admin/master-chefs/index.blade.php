@extends('adminlte::page')

@section('title', 'Master Chefs Header')

@section('content_header')
    <h1>Master Chefs Header</h1>
@stop

@section('content')
  @if ($masterchefs)
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      <a href="{{ url('/admin/master-chefs/' . $masterchefs->id . '/edit') }}" title="Edit Master Chefs Header"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <br/>
                      <br/>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th> Title </th><td> {{ $masterchefs->title }} </td>
                            </tr>
                            <tr>
                              <th> Description </th><td> {{ $masterchefs->description }} </td>
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
