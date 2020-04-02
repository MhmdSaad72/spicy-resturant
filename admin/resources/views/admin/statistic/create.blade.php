@extends('adminlte::page')

@section('title', 'Create New Statistic')

@section('content_header')
    <h1>Create New Statistic</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ url('/admin/statistic') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        @include ('admin.statistic.form', ['formMode' => 'create'])

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
