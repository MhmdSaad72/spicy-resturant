@extends('adminlte::page')

@section('title', 'Edit Statistic')

@section('content_header')
    <h1>Edit Statistic</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{ url('/admin/statistic/' . $statistic->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.statistic.form', ['formMode' => 'edit'])

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
