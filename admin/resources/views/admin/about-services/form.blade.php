<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
  <label for="image" class="control-label">{{ 'Image' }}</label>
  <input class="form-control" name="image" type="file" id="image" value="{{ isset($aboutservice->image) ? $aboutservice->image : old('image')}}" >
  {!! $errors->first('image', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($aboutservice->title) ? $aboutservice->title : old('title')}}" >
    {!! $errors->first('title', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Content' }}</label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content" >{{ isset($aboutservice->content) ? $aboutservice->content : old('content')}}</textarea>
    {!! $errors->first('content', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('icon') ? 'has-error' : ''}}">
    <label for="icon" class="control-label">{{ 'Icon' }}</label>
    <input class="form-control" name="icon" type="file" id="icon" value="{{ isset($aboutservice->icon) ? $aboutservice->icon : old('icon')}}">
    {!! $errors->first('icon', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
