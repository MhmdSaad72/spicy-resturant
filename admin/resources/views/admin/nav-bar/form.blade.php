<div class="form-group {{ $errors->has('home') ? 'has-error' : ''}}">
    <label for="home" class="control-label">{{ 'Home' }}</label>
    <input class="form-control" name="home" type="text" id="home" value="{{ isset($navbar->home) ? $navbar->home : old('home')}}" >
    {!! $errors->first('home', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('about') ? 'has-error' : ''}}">
    <label for="about" class="control-label">{{ 'About' }}</label>
    <input class="form-control" name="about" type="text" id="about" value="{{ isset($navbar->about) ? $navbar->about : old('about')}}" >
    {!! $errors->first('about', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('about_1') ? 'has-error' : ''}}">
    <label for="about_1" class="control-label">{{ 'About style 1' }}</label>
    <input class="form-control" name="about_1" type="text" id="about_1" value="{{ isset($navbar->about_1) ? $navbar->about_1 : old('about_1')}}" >
    {!! $errors->first('about_1', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('about_2') ? 'has-error' : ''}}">
    <label for="about_2" class="control-label">{{ 'About style 2' }}</label>
    <input class="form-control" name="about_2" type="text" id="about_2" value="{{ isset($navbar->about_2) ? $navbar->about_2 : old('about_2')}}" >
    {!! $errors->first('about_2', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('contact') ? 'has-error' : ''}}">
    <label for="contact" class="control-label">{{ 'Contact' }}</label>
    <input class="form-control" name="contact" type="text" id="contact" value="{{ isset($navbar->contact) ? $navbar->contact : old('contact')}}" >
    {!! $errors->first('contact', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('contact_1') ? 'has-error' : ''}}">
    <label for="contact_1" class="control-label">{{ 'Contact style 1' }}</label>
    <input class="form-control" name="contact_1" type="text" id="contact_1" value="{{ isset($navbar->contact_1) ? $navbar->contact_1 : old('contact_1')}}" >
    {!! $errors->first('contact_1', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('contact_2') ? 'has-error' : ''}}">
    <label for="contact_2" class="control-label">{{ 'Contact style 2' }}</label>
    <input class="form-control" name="contact_2" type="text" id="contact_2" value="{{ isset($navbar->contact_2) ? $navbar->contact_2 : old('contact_2')}}" >
    {!! $errors->first('contact_2', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('menu') ? 'has-error' : ''}}">
    <label for="menu" class="control-label">{{ 'Menu' }}</label>
    <input class="form-control" name="menu" type="text" id="menu" value="{{ isset($navbar->menu) ? $navbar->menu : old('menu')}}" >
    {!! $errors->first('menu', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('menu_1') ? 'has-error' : ''}}">
    <label for="menu_1" class="control-label">{{ 'Menu style 1' }}</label>
    <input class="form-control" name="menu_1" type="text" id="menu_1" value="{{ isset($navbar->menu_1) ? $navbar->menu_1 : old('menu_1')}}" >
    {!! $errors->first('menu_1', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('menu_2') ? 'has-error' : ''}}">
    <label for="menu_2" class="control-label">{{ 'Menu style 2' }}</label>
    <input class="form-control" name="menu_2" type="text" id="menu_2" value="{{ isset($navbar->menu_2) ? $navbar->menu_2 : old('menu_2')}}" >
    {!! $errors->first('menu_2', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pages') ? 'has-error' : ''}}">
    <label for="pages" class="control-label">{{ 'Pages' }}</label>
    <input class="form-control" name="pages" type="text" id="pages" value="{{ isset($navbar->pages) ? $navbar->pages : old('pages')}}" >
    {!! $errors->first('pages', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
