@extends('adminlte::page')

@section('title', 'Our Services Header')

@section('content_header')
    <h1>Our Services Header</h1>
@stop

@section('content')
  @if ($ourserviceshead)
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      <a href="{{ url('/admin/our-services-head/' . $ourserviceshead->id . '/edit') }}" title="Edit Our Service Header"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <br/>
                      <br/>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th> Title </th><td> {{ $ourserviceshead->title }} </td>
                            </tr>
                            <tr>
                              <th> Description </th><td> {{ $ourserviceshead->description }} </td>
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
