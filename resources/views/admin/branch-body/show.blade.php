@extends('adminlte::page')

@section('title', 'Branch Body')

@section('content_header')
    <h1>Branch Body</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/admin/branch-body') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/branch-body/' . $branchbody->id . '/edit') }}" title="Edit BranchBody"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/branchbody' . '/' . $branchbody->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete BranchBody" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                      <th> Place </th><td> {{ $branchbody->place }} </td>
                                    </tr>
                                    <tr>
                                      <th> Address </th><td> {{ $branchbody->address }} </td>
                                    </tr>
                                    <tr>
                                      <th> Phone </th><td> {{ $branchbody->phone }} </td>
                                    </tr>
                                    <tr>
                                      <th> Email </th><td> {{ $branchbody->email }} </td>
                                    </tr>
                                    <tr>
                                      <th> Map directions </th><td> {{ $branchbody->map_directions }} </td>
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
