@extends('adminlte::page')

@section('title', 'Edit About Service')

@section('content_header')
    <h1>Edit About Service</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ url('/admin/about-services') }}" title="Back"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />

                    <form method="POST" action="{{ url('/admin/about-services/' . $aboutservice->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('admin.about-services.form', ['formMode' => 'edit'])

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
