@extends('adminlte::page')

@section('title', 'Create New Slide Menu')

@section('content_header')
    <h1>Create New Slide Menu</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/admin/slide-menu') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        <form method="POST" action="{{ url('/admin/slide-menu') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
                                <label for="category_id" class="control-label">Categories</label>
                                <select name="category_id" class="form-control" id="category_id" >
                                  <option value="" selected disabled>Select Category</option>
                                  @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}"{{$categorie->id == old('category_id') ? 'selected': ''}}>{{$categorie->name}}</option>
                                  @endforeach

                            </select>
                                {!! $errors->first('category_id', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('tag_id') ? 'has-error' : ''}}">
                                <label for="tag_id" class="control-label">Tags</label>
                                <select name="tag_id" class="form-control" id="tag_id" >
                                  <option value="" selected disabled>Select Tag</option>
                                  @foreach($tags as $tag)
                                    <option value="{{$tag->id}}"{{$tag->id == old('tag_id') ? 'selected': ''}}>{{$tag->name}}</option>
                                  @endforeach

                            </select>
                                {!! $errors->first('tag_id', '<p class="help-block text-danger">:message</p>') !!}
                            </div>

                            @include ('admin.slide-menu.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
