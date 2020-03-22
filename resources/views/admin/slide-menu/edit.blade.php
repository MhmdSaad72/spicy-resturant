@extends('adminlte::page')

@section('title', 'Edit Dish')

@section('content_header')
    <h1>Edit Dish</h1>
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

                        <form method="POST" action="{{ url('/admin/slide-menu/' . $slidemenu->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.slide-menu.form', ['formMode' => 'edit'])

                            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
                                <label for="category_id" class="control-label">Categories</label>
                                <select name="category_id" class="form-control" id="category_id" >
                                  <option value="" selected disabled>Select Category</option>
                                  @foreach($categories as $category)
                                    <option value="{{$category->id}}"{{$category->id == $slidemenu->category_id ? 'selected': ''}}>{{$category->name}}</option>
                                  @endforeach

                            </select>
                                {!! $errors->first('category_id', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('tag_id') ? 'has-error' : ''}}">
                                <label for="tag_id" class="control-label">Tags</label>
                                <select name="tag_id" class="form-control" id="tag_id" >
                                  <option value="" selected disabled>Select Tag</option>
                                  @foreach($tags as $tag)
                                    <option value="{{$tag->id}}"{{$tag->id == $slidemenu->tag_id ? 'selected': ''}}>{{$tag->name}}</option>
                                  @endforeach

                            </select>
                                {!! $errors->first('tag_id', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('featured') ? 'has-error' : ''}}">
                                <input type="checkbox" id="featured" name="featured" value="1" {{$slidemenu->featured == 1 ? 'checked' : ''}}>
                                <label for="featured" class="control-label">{{ 'Featured' }}</label>
                                {!! $errors->first('featured', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="{{ 'Update' }}">
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
