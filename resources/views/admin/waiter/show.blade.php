@extends('adminlte::page')

@section('title', 'Waiter')

@section('content_header')
    <h1>Waiter</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/admin/waiter') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/waiter/' . $waiter->id . '/edit') }}" title="Edit Waiter"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/waiter' . '/' . $waiter->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Waiter" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $waiter->id }}</td>
                                    </tr>
                                    <tr>
                                      <th> Name </th><td> {{ $waiter->name }} </td>
                                    </tr>
                                    <tr>
                                      <th> Position </th><td> {{ $waiter->position }} </td>
                                    </tr>
                                    <tr>
                                      <th> Image </th><td> <img src="{{asset('storage/' . $waiter->image)}}" alt=""> </td>
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
