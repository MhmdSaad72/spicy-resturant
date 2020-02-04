@extends('adminlte::page')

@section('title', 'Album')

@section('content_header')
    <h1>Album</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Album {{ $album->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/album') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/album/' . $album->id . '/edit') }}" title="Edit Album"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/album' . '/' . $album->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Album" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $album->id }}</td>
                                    </tr>
                                    <tr>
                                      <th> Title </th><td> {{ $album->title }} </td>
                                    </tr>
                                    <tr>
                                      <th> Description </th><td> {{ $album->description }} </td>
                                    </tr>
                                    <tr>
                                      <th> Name </th><td> {{ $album->name }} </td>
                                    </tr>
                                    <tr>
                                      <th> Image </th><td> {{ $album->image }} </td>
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
