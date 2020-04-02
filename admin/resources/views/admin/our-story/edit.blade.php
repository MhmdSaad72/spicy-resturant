@extends('adminlte::page')

@section('title', 'Edit Our Story Section')

@section('content_header')
    <h1>Edit Our Story Section</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    

                    <form method="POST" action="{{ url('/admin/our-story/' . $ourstory->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('admin.our-story.form', ['formMode' => 'edit'])

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
