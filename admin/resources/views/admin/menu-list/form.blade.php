<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($menulist->title) ? $menulist->title : old('title')}}" >
    {!! $errors->first('title', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <input class="form-control" name="description" type="text" id="description" value="{{ isset($menulist->description) ? $menulist->description : old('description')}}" >
    {!! $errors->first('description', '<p class="help-block text-danger">:message</p>') !!}
</div>
{{-- <div class="form-group {{ $errors->has('slide_id') ? 'has-error' : ''}}">
    <label for="slide_id" class="control-label">{{ 'Slide Id' }}</label>
    <input class="form-control" name="slide_id" type="number" id="slide_id" value="{{ isset($menulist->slide_id) ? $menulist->slide_id : ''}}" >
    {!! $errors->first('slide_id', '<p class="help-block text-danger">:message</p>') !!}
</div> --}}


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
