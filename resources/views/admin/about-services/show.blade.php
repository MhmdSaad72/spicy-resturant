@extends('adminlte::page')

@section('title', 'About Service')

@section('content_header')
    <h1>About Service</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{ url('/admin/about-services') }}" title="Back"><button class="btn btn-dark btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                    </a>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                  <th> Title </th><td> {{ $aboutservice->title }} </td>
                                </tr>
                                <tr>
                                  <th> Content </th><td> {{ $aboutservice->content }} </td>
                                </tr>
                                <tr>
                                  <th> Icon </th><td> <img src="{{ asset('storage/' . $aboutservice->icon) }}" alt=""> </td>
                                </tr>
                                <tr>
                                  <th> Image </th><td> <img src="{{ asset('storage/' . $aboutservice->image) }}" alt=""> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
