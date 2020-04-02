@extends('adminlte::page')

@section('title', 'Create New Album')

@section('content_header')
    <h1>Create New Album</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ url('/admin/album') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.album.form', ['formMode' => 'create'])

                        </form>

                        <a href="{{ url('/admin/album') }}" title="Back"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
