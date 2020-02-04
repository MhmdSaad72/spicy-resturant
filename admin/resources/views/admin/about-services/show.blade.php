@extends('adminlte::page')

@section('title', 'About Service')

@section('content_header')
    <h1>About Service</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/admin/about-services') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/about-services/' . $aboutservice->id . '/edit') }}" title="Edit AboutService"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/aboutservices' . '/' . $aboutservice->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete AboutService" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                      <th> Image </th><td> <img src="{{ asset('storage/' . $aboutservice->image) }}" alt=""> </td>
                                    </tr>
                                    <tr>
                                      <th> Title </th><td> {{ $aboutservice->title }} </td>
                                    </tr>
                                    <tr>
                                      <th> Content </th><td> {{ $aboutservice->content }} </td>
                                    </tr>
                                    <tr>
                                      <th> Icon </th><td> <img src="{{ asset('storage/' . $aboutservice->icon) }}" alt=""> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
