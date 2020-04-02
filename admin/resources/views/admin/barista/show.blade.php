@extends('adminlte::page')

@section('title', 'Barista')

@section('content_header')
    <h1>Barista</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/admin/barista') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/barista/' . $baristum->id . '/edit') }}" title="Edit Baristum"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/barista' . '/' . $baristum->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Baristum" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $baristum->id }}</td>
                                    </tr>
                                    <tr>
                                      <th> Name </th><td> {{ $baristum->name }} </td>
                                    </tr>
                                    <tr>
                                      <th> Position </th><td> {{ $baristum->position }} </td>
                                    </tr>
                                    <tr>
                                      <th> Image </th><td> <img src="{{asset('storage/' . $baristum->image)}}" alt=""> </td>
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
