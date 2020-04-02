@extends('adminlte::page')

@section('title', 'Hero Section')

@section('content_header')
    <h1>Hero Section</h1>
    <p class="text-muted">Edit all the information exists in home pages's hero section</p>
@stop

@section('content')
  @if ($service)
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary" href="{{ url('/admin/hero/' . $service->id . '/edit') }}" title="Edit Service"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>

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
  @endif
@endsection
