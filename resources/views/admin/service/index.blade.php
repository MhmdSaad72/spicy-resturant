@extends('adminlte::page')

@section('title', 'Service')

@section('content_header')
    <h1>Food service</h1>
@stop

@section('content')
  @if ($service)
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/admin/service/' . $service->id . '/edit') }}" title="Edit Service"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>
                              <tr>
                                <th> Title </th><td> {{ $service->title }} </td>
                              </tr>
                              <tr>
                                <th> Description </th><td> {{ $service->description }} </td>
                              </tr>
                              <tr>
                                <th> Address </th><td> {{ $service->address }} </td>
                              </tr>
                              <tr>
                                <th> Content </th><td> {{ $service->content }} </td>
                              </tr>
                              <tr>
                                <th> Image </th><td> <img src="{{asset('storage/' . $service->image)}}" alt=""> </td>
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
