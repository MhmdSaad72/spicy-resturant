<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($basicdetail->name) ? $basicdetail->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    <label for="logo" class="control-label">{{ 'Logo' }}</label>
    <input class="form-control" name="logo" type="file" id="logo" value="{{ isset($basicdetail->logo) ? $basicdetail->logo : old('logo')}}" >
    {!! $errors->first('logo', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('footer_logo') ? 'has-error' : ''}}">
    <label for="footer_logo" class="control-label">{{ 'Footer Logo' }}</label>
    <input class="form-control" name="footer_logo" type="file" id="footer_logo" value="{{ isset($basicdetail->footer_logo) ? $basicdetail->footer_logo : old('footer_logo')}}" >
    {!! $errors->first('footer_logo', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Content' }}</label>
    <input class="form-control" name="content" type="text" id="content" value="{{ isset($basicdetail->content) ? $basicdetail->content : old('content')}}" >
    {!! $errors->first('content', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('hot_line') ? 'has-error' : ''}}">
    <label for="hot_line" class="control-label">{{ 'Hot Line' }}</label>
    <input class="form-control" name="hot_line" type="number" id="hot_line" value="{{ isset($basicdetail->hot_line) ? $basicdetail->hot_line : old('hot_line')}}" >
    {!! $errors->first('hot_line', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
