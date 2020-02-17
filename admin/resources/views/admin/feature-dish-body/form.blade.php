<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($featuredishbody->title) ? $featuredishbody->title : old('title')}}" >
    {!! $errors->first('title', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($featuredishbody->image) ? $featuredishbody->image : old('image')}}" >
    {!! $errors->first('image', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Content' }}</label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content" >{{ isset($featuredishbody->content) ? $featuredishbody->content : old('content')}}</textarea>
    {!! $errors->first('content', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($featuredishbody->price) ? $featuredishbody->price : old('price')}}" step=any />
    {!! $errors->first('price', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('old_price') ? 'has-error' : ''}}">
    <label for="old_price" class="control-label">{{ 'Old Price' }}</label>
    <input class="form-control" name="old_price" type="number" id="old_price" value="{{ isset($featuredishbody->old_price) ? $featuredishbody->old_price : old('old_price')}}" step=any />
    {!! $errors->first('old_price', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
