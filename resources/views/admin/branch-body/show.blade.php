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
