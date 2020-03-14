@extends('adminlte::page')

@section('title', 'Nav-Bar')

@section('content_header')
    <h1>Nav-Bar</h1>
@stop

@section('content')
  @if ($navbar)
  <div class="container">
      <div class="row">
          <div class="col-md-9">
              <div class="card">
                  <div class="card-body">
                      <a href="{{ url('/admin/nav-bar/' . $navbar->id . '/edit') }}" title="Edit Nav Bar"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <br/>
                      <br/>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th> Home </th><td> {{ $navbar->home }} </td>
                            </tr>
                            <tr>
                              <th> Menu </th><td> {{ $navbar->menu }} </td>
                            </tr>
                            <tr>
                              <th> Menu style 1 </th><td> {{ $navbar->menu_1 }} </td>
                            </tr>
                            <tr>
                              <th> Menu style 2 </th><td> {{ $navbar->menu_2 }} </td>
                            </tr>
                            <tr>
                              <th> About </th><td> {{ $navbar->about }} </td>
                            </tr>
                            <tr>
                              <th> About style 1 </th><td> {{ $navbar->about_1 }} </td>
                            </tr>
                            <tr>
                              <th> About style 2 </th><td> {{ $navbar->about_2 }} </td>
                            </tr>
                            <tr>
                              <th> Contact </th><td> {{ $navbar->contact }} </td>
                            </tr>
                            <tr>
                              <th> Contact style 1 </th><td> {{ $navbar->contact_1 }} </td>
                            </tr>
                            <tr>
                              <th> Contact style 2 </th><td> {{ $navbar->contact_2 }} </td>
                            </tr>
                            <tr>
                              <th> Pages </th><td> {{ $navbar->pages }} </td>
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
