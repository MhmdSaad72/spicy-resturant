@extends('adminlte::page')

@section('title', 'Food Menus')

@section('content_header')
    <h1>Food Menus</h1>
@stop

@section('content')
  @if ($foodmenu)
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      <a href="{{ url('/admin/food-menu/' . $foodmenu->id . '/edit') }}" title="Edit Food Menu"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <br/>
                      <br/>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th> Title </th><td> {{ $foodmenu->title }} </td>
                            </tr>
                            <tr>
                              <th> Description </th><td> {{ $foodmenu->description }} </td>
                            </tr>
                            <tr>
                              <th> Content </th><td> {{ $foodmenu->content }} </td>
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
