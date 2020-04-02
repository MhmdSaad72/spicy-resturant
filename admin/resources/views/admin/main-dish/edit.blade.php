@extends('adminlte::page')

@section('title', 'Edit Main Dish Section')

@section('content_header')
    <h1>Edit Main Dish Section</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form method="POST" action="{{ url('/admin/main-dish/' . $maindish->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('dish_id') ? 'has-error' : ''}}">
                            <label for="dish_id" class="control-label">Dishes</label>
                            <select name="dish_id" class="form-control" id="dish_id" >
                              <option value="" selected disabled>Select dish</option>
                              @foreach($dishes as $dish)
                                <option value="{{$dish->id}}"{{$dish->id == $maindish->dish_id ? 'selected': ''}}>{{$dish->title}}</option>
                              @endforeach

                        </select>
                            {!! $errors->first('dish_id', '<p class="help-block text-danger">:message</p>') !!}
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="{{ 'Update' }}">
                            <a class="btn btn-warning" href="{{ url('/admin/main-dish') }}" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
