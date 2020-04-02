@extends('adminlte::page')

@section('title', 'Edit awards accordion item')

@section('content_header')
    <h1>Edit awards accordion item</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form method="POST" action="{{ url('/admin/awards-accordion/' . $awardsaccordion->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('admin.awards-accordion.form', ['formMode' => 'edit'])

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
