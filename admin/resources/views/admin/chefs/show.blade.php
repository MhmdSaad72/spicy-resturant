@extends('adminlte::page')

@section('title', 'Chef')

@section('content_header')
    <h1>Chef</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/admin/chefs') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/chefs/' . $chef->id . '/edit') }}" title="Edit Chef"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/chefs' . '/' . $chef->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Chef" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                      <th> Name </th><td> {{ $chef->name }} </td>
                                    </tr>
                                    <tr>
                                      <th> Description </th><td> {{ $chef->description }} </td>
                                    </tr>
                                    <tr>
                                      <th> Image </th><td> <img src="{{ asset('storage/' . $chef->image) }}" alt="{{$chef->name}}"> </td>
                                    </tr>
                                    <tr>
                                      <th> Facebook </th><td> {{ $chef->facebook }} </td>
                                    </tr>
                                    <tr>
                                      <th> Twitter </th><td> {{ $chef->twitter }} </td>
                                    </tr>
                                    <tr>
                                      <th> Youtube </th><td> {{ $chef->youtube }} </td>
                                    </tr>
                                    <tr>
                                      <th> Instagram </th><td> {{ $chef->instagram }} </td>
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
