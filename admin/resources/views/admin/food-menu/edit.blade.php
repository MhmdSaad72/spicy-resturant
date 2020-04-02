@extends('adminlte::page')

@section('title', 'Edit Menu Page Hero Section')

@section('content_header')
    <h1>Edit Menu Page Hero Section</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form method="POST" action="{{ url('/admin/food-menu/' . $foodmenu->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('admin.food-menu.form', ['formMode' => 'edit'])

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
