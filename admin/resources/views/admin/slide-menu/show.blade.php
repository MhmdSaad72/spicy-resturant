@extends('adminlte::page')

@section('title', 'Slide Menu')

@section('content_header')
    <h1>Slide Menu</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/admin/slide-menu') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/slide-menu/' . $slidemenu->id . '/edit') }}" title="Edit SlideMenu"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/slidemenu' . '/' . $slidemenu->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete SlideMenu" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                      <th> Price </th><td> {{ $slidemenu->price }} </td>
                                    </tr>
                                    <tr>
                                      <th> Title </th><td> {{ $slidemenu->title }} </td>
                                    </tr>
                                    <tr>
                                      <th> Content </th><td> {{ $slidemenu->content }} </td>
                                    </tr>
                                    <tr>
                                      <th> SKU </th><td> {{ $slidemenu->sku }} </td>
                                    </tr>
                                    <tr>
                                      <th> Category </th><td> {{ $slidemenu->category->name }} </td>
                                    </tr>
                                    <tr>
                                      <th> Tag </th><td> {{ $slidemenu->tag->name }} </td>
                                    </tr>
                                    <tr>
                                      <th> Weight </th><td> {{ $slidemenu->weight }} </td>
                                    </tr>
                                    <tr>
                                      <th> Calories </th><td> {{ $slidemenu->calories }} </td>
                                    </tr>
                                    <tr>
                                      <th> Description </th><td> {{ $slidemenu->more_content}} </td>
                                    </tr>
                                    <tr>
                                      <th> Related Title </th><td> {{ $slidemenu->related_title }} </td>
                                    </tr>
                                    <tr>
                                      <th> Related Description </th><td> {{ $slidemenu->related_description }} </td>
                                    </tr>
                                    <tr>
                                      <th> Image </th><td> <img src="{{ asset('storage/' . $slidemenu->image) }}" alt=""> </td>
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
