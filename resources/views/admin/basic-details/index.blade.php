@extends('adminlte::page')

@section('title', 'Basic Details')

@section('content_header')
    <h1>Basic Details</h1>
@stop

@section('content')
  @if ($basicDetail)
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      <a href="{{ url('/admin/basic-details/' . $basicDetail->id . '/edit') }}" title="Edit Basic Details"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <br/>
                      <br/>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th> Name </th><td> {{ $basicDetail->name }} </td>
                            </tr>
                            <tr>
                              <th> Content </th><td> {{ $basicDetail->content }} </td>
                            </tr>
                            <tr>
                              <th> Hot line </th><td> {{ $basicDetail->hot_line }} </td>
                            </tr>
                            <tr>
                              <th> Logo </th><td><img src="{{asset('storage/' . $basicDetail->logo)}}"></td>
                            </tr>
                            <tr>
                              <th> Footer Logo </th><td><img src="{{asset('storage/' . $basicDetail->footer_logo)}}"></td>
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
