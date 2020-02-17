@extends('adminlte::page')

@section('title', 'Branch head')

@section('content_header')
    <h1>Branch head</h1>
@stop

@section('content')
  @if ($branchhead)
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      <a href="{{ url('/admin/branch-head/' . $branchhead->id . '/edit') }}" title="Edit Branch Header"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <br/>
                      <br/>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th> Title </th><td> {{ $branchhead->title }} </td>
                            </tr>
                            <tr>
                              <th> Description </th><td> {{ $branchhead->description }} </td>
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
