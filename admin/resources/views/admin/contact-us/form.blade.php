<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($contactus->title) ? $contactus->title : old('title')}}" >
    {!! $errors->first('title', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Content' }}</label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content" >{{ isset($contactus->content) ? $contactus->content : old('content')}}</textarea>
    {!! $errors->first('content', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <input class="form-control" name="description" type="text" id="description" value="{{ isset($contactus->description) ? $contactus->description : old('description')}}" >
    {!! $errors->first('description', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('form_title') ? 'has-error' : ''}}">
    <label for="form_title" class="control-label">{{ 'Form Title' }}</label>
    <input class="form-control" name="form_title" type="text" id="form_title" value="{{ isset($contactus->form_title) ? $contactus->form_title : old('form_title')}}" >
    {!! $errors->first('form_title', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('form_description') ? 'has-error' : ''}}">
    <label for="form_description" class="control-label">{{ 'Form Description' }}</label>
    <input class="form-control" name="form_description" type="text" id="form_description" value="{{ isset($contactus->form_description) ? $contactus->form_description : old('form_description')}}" >
    {!! $errors->first('form_description', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('form_content') ? 'has-error' : ''}}">
    <label for="form_content" class="control-label">{{ 'Form Content' }}</label>
    <textarea class="form-control" rows="5" name="form_content" type="textarea" id="form_content" >{{ isset($contactus->form_content) ? $contactus->form_content : old('form_content')}}</textarea>
    {!! $errors->first('form_content', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('facebook') ? 'has-error' : ''}}">
    <label for="facebook" class="control-label">{{ 'Facebook' }}</label>
    <input class="form-control" name="facebook" type="text" id="facebook" value="{{ isset($contactus->facebook) ? $contactus->facebook : old('facebook')}}" >
    {!! $errors->first('facebook', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('twitter') ? 'has-error' : ''}}">
    <label for="twitter" class="control-label">{{ 'Twitter' }}</label>
    <input class="form-control" name="twitter" type="text" id="twitter" value="{{ isset($contactus->twitter) ? $contactus->twitter : old('twitter')}}" >
    {!! $errors->first('twitter', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('youtube') ? 'has-error' : ''}}">
    <label for="youtube" class="control-label">{{ 'Youtube' }}</label>
    <input class="form-control" name="youtube" type="text" id="youtube" value="{{ isset($contactus->youtube) ? $contactus->youtube : old('youtube')}}" >
    {!! $errors->first('youtube', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('instagram') ? 'has-error' : ''}}">
    <label for="instagram" class="control-label">{{ 'Instagram' }}</label>
    <input class="form-control" name="instagram" type="text" id="instagram" value="{{ isset($contactus->instagram) ? $contactus->instagram : old('instagram')}}" >
    {!! $errors->first('instagram', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($contactus->image) ? $contactus->image : old('image')}}" >
    {!! $errors->first('image', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('place') ? 'has-error' : ''}}">
    <label for="place" class="control-label">{{ 'Place' }}</label>
    <input class="form-control" name="place" type="text" id="place" value="{{ isset($contactus->place) ? $contactus->place : old('place')}}" >
    {!! $errors->first('place', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($contactus->address) ? $contactus->address : old('address')}}" >
    {!! $errors->first('address', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
