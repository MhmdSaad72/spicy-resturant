@extends('adminlte::page')

@section('title', 'Philosophy Section')

@section('content_header')
    <h1>Philosophy Section</h1>
@stop

@section('content')
  @if ($philosophy)
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  <a class="btn btn-primary" href="{{ url('/admin/philosophy/' . $philosophy->id . '/edit') }}" title="Edit Philosophy Section"><i class="fas fa-pen" aria-hidden="true"></i> Edit</a>

                  <br/>
                  <br/>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th> Subtitle </th><td> {{ $philosophy->title }} </td>
                        </tr>
                        <tr>
                          <th> Title </th><td> {{ $philosophy->description }} </td>
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
@endif
@endsection
