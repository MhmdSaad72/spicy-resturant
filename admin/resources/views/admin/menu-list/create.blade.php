@extends('adminlte::page')

@section('title', 'Create New Menu List')

@section('content_header')
    <h1>Create New Menu List</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/admin/menu-list') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        <form method="POST" action="{{ url('/admin/menu-list') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('slide_id') ? 'has-error' : ''}}">
                                <label for="slide_id" class="control-label">Slide Menus</label>
                                <select name="slide_id" class="form-control" id="slide_id" >
                                  <option value="" selected disabled>Select Slide Menu</option>
                                  @foreach($slideMenus as $slideMenu)
                                    <option value="{{$slideMenu->id}}"{{$slideMenu->id == old('slide_id') ? 'selected': ''}}>{{$slideMenu->title}}</option>
                                  @endforeach

                            </select>
                                {!! $errors->first('slide_id', '<p class="help-block text-danger">:message</p>') !!}
                            </div>

                            @include ('admin.menu-list.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
