@extends('adminlte::page')

@section('title', 'Menu Page Hero Section')

@section('content_header')
    <h1>Menu Page Hero Section</h1>
@stop

@section('content')
  @if ($foodmenu)
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  <a class="btn btn-primary" href="{{ route('food-menu.edit' , $foodmenu->id) }}" title="Edit Menu Page Hero Section"><i class="fas fa-pen" aria-hidden="true"></i> Edit</a>

                  <br/>
                  <br/>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th> Subtitle </th><td> {{ $foodmenu->title }} </td>
                        </tr>
                        <tr>
                          <th> Title </th><td> {{ $foodmenu->description }} </td>
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
@endif
@endsection
