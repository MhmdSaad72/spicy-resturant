@extends('adminlte::page')

@section('title', 'Gallary')

@section('content_header')
    <h1>Gallary</h1>
@stop

@section('content')
  @if ($gallary)
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      <a href="{{ url('/admin/gallary/' . $gallary->id . '/edit') }}" title="Edit Gallary"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <br/>
                      <br/>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th> Title </th><td> {{ $gallary->title }} </td>
                            </tr>
                            <tr>
                              <th> Description </th><td> {{ $gallary->description }} </td>
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
