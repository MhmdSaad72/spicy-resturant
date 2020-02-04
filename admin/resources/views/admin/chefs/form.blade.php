<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($chef->name) ? $chef->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <input class="form-control" name="description" type="text" id="description" value="{{ isset($chef->description) ? $chef->description : old('description')}}" >
    {!! $errors->first('description', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image" type="file" id="image">
    {!! $errors->first('image', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('facebook') ? 'has-error' : ''}}">
    <label for="facebook" class="control-label">{{ 'Facebook' }}</label>
    <input class="form-control" name="facebook" type="text" id="facebook" value="{{ isset($chef->facebook) ? $chef->facebook : old('facebook')}}" >
    {!! $errors->first('facebook', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('twitter') ? 'has-error' : ''}}">
    <label for="twitter" class="control-label">{{ 'Twitter' }}</label>
    <input class="form-control" name="twitter" type="text" id="twitter" value="{{ isset($chef->twitter) ? $chef->twitter : old('twitter')}}" >
    {!! $errors->first('twitter', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('instagram') ? 'has-error' : ''}}">
    <label for="instagram" class="control-label">{{ 'Instagram' }}</label>
    <input class="form-control" name="instagram" type="text" id="instagram" value="{{ isset($chef->instagram) ? $chef->instagram : old('instagram')}}" >
    {!! $errors->first('instagram', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('youtube') ? 'has-error' : ''}}">
    <label for="youtube" class="control-label">{{ 'Youtube' }}</label>
    <input class="form-control" name="youtube" type="text" id="youtube" value="{{ isset($chef->youtube) ? $chef->youtube : old('youtube')}}" >
    {!! $errors->first('youtube', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
