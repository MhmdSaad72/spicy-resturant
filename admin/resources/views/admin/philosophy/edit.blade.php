@extends('adminlte::page')

@section('title', 'Edit Philosophy')

@section('content_header')
    <h1>Edit Philosophy</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-warning" href="{{ url('/admin/philosophy') }}" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                    <br />
                    <br />

                    <form method="POST" action="{{ url('/admin/philosophy/' . $philosophy->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('admin.philosophy.form', ['formMode' => 'edit'])

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
