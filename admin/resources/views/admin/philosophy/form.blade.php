<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Subtitle' }} <span class="text-muted small ml-2">- Small colored heading</span> </label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($philosophy->title) ? $philosophy->title : old('title')}}" >
    {!! $errors->first('title', '<p class="help-block text-danger">:message</p>') !!}

</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
  <label for="description" class="control-label">{{ 'Title' }} <span class="text-muted small ml-2">- Section main heading</span></label>
  <input class="form-control" name="description" type="text" id="description" value="{{ isset($philosophy->description) ? $philosophy->description : old('description')}}" >
  {!! $errors->first('description', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Content' }}</label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content" >{{ isset($philosophy->content) ? $philosophy->content : old('content')}}</textarea>
    {!! $errors->first('content', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($philosophy->name) ? $philosophy->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
    <label for="position" class="control-label">{{ 'Position' }}</label>
    <input class="form-control" name="position" type="text" id="position" value="{{ isset($philosophy->position) ? $philosophy->position : old('position')}}" >
    {!! $errors->first('position', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <a class="btn btn-warning" href="{{ url('/admin/philosophy') }}" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
</div>
