@extends('adminlte::page')

@section('title', 'Edit Hero Section')

@section('content_header')
    <h1>Edit Her Section</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form method="POST" action="{{ url('/admin/hero/' . $service->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('admin.hero.form', ['formMode' => 'edit'])

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
