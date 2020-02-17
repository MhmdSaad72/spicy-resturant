@extends('adminlte::page')

@section('title', 'Featured Dishes Body')

@section('content_header')
    <h1>Featured Dishes Body</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/admin/feature-dish-body') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/feature-dish-body/' . $featuredishbody->id . '/edit') }}" title="Edit FeatureDishBody"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/featuredishbody' . '/' . $featuredishbody->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete FeatureDishBody" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                      <th> Title </th><td> {{ $featuredishbody->title }} </td>
                                    </tr>
                                    <tr>
                                      <th> Content </th><td> {{ $featuredishbody->content }} </td>
                                    </tr>
                                    <tr>
                                      <th> Price </th><td> {{ $featuredishbody->price }} </td>
                                    </tr>
                                    <tr>
                                      <th> Old Price </th><td> {{ $featuredishbody->old_price }} </td>
                                    </tr>
                                    <tr>
                                      <th> Image </th><td> <img src="{{ asset('storage/' . $featuredishbody->image) }}" alt=""> </td>
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
