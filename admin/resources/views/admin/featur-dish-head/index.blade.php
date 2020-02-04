@extends('adminlte::page')

@section('title', 'Featured Dishes Header')

@section('content_header')
    <h1>Featured Dishes Header</h1>
@stop

@section('content')
  @if ($featurdishhead)
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      <a href="{{ url('/admin/featur-dish-head/' . $featurdishhead->id . '/edit') }}" title="Edit Featured Dishes Header"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <br/>
                      <br/>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th> Title </th><td> {{ $featurdishhead->title }} </td>
                            </tr>
                            <tr>
                              <th> Description </th><td> {{ $featurdishhead->description }} </td>
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
