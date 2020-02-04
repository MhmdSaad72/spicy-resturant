@extends('adminlte::page')

@section('title', 'Menu List')

@section('content_header')
    <h1>Menu List</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/admin/menu-list') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/menu-list/' . $menulist->id . '/edit') }}" title="Edit MenuList"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/menulist' . '/' . $menulist->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete MenuList" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $menulist->id }}</td>
                                    </tr>
                                    <tr>
                                      <th> Title </th><td> {{ $menulist->title }} </td>
                                    </tr>
                                    <tr>
                                      <th> Description </th><td> {{ $menulist->description }} </td>
                                    </tr>
                                    <tr>
                                      <th> Slide Id </th><td> {{ $menulist->slide_id }} </td>
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
