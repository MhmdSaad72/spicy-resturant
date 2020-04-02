@extends('adminlte::page')

@section('title', 'Edit Basic Details')

@section('content_header')
    <h1 class="mb-2">Edit restaurant capacity</h1>
    <div class="row">
        <div class="col-lg-7">
            <p class="text-gray text-small font-weight-light">Restaurant capacity shows how many tables and how many chairs exist in the restaurant, this information is important for booking actions.</p>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ url('/admin/basic-reservation/' . $basicReserve->id . '/edit') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('tables') ? 'has-error' : ''}}">
                                <label for="tables" class="control-label">{{ 'Number Of Tables' }}</label>
                                <input class="form-control" name="tables" type="number" id="tables" value="{{ isset($basicReserve->tables) ? $basicReserve->tables : old('tables')}}" >
                                {!! $errors->first('tables', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('chairs') ? 'has-error' : ''}}">
                                <label for="chairs" class="control-label">{{ 'Chairs for One Table' }}</label>
                                <input class="form-control" name="chairs" type="number" id="chairs" value="{{ isset($basicReserve->chairs) ? $basicReserve->chairs : old('chairs')}}" >
                                {!! $errors->first('chairs', '<p class="help-block text-danger">:message</p>') !!}
                            </div>

                            <div class="form-group mb-0">
                                <input class="btn btn-primary" type="submit" value="{{'Update'}}">
                                <a href="{{ url('/admin/basic-reservation') }}" title="Back"><button class="btn btn-secondary">Back</button></a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
