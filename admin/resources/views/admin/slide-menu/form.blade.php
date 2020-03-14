<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($slidemenu->title) ? $slidemenu->title : old('title')}}" >
    {!! $errors->first('title', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($slidemenu->image) ? $slidemenu->image : old('image')}}" >
    {!! $errors->first('image', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price ($)' }}</label>
    <input class="form-control" name="price" type="number" id="price"  value="{{ isset($slidemenu->price) ? $slidemenu->price : old('price')}}"  step=any />
    {!! $errors->first('price', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
    <label for="discount" class="control-label">{{ 'Discount (%)' }}</label>
    <input class="form-control" name="discount" type="number" id="discount"  value="{{ isset($slidemenu->discount) ? $slidemenu->discount : old('discount')}}"  step=any />
    {!! $errors->first('discount', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Content' }}</label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content" >{{ isset($slidemenu->content) ? $slidemenu->content : old('content')}}</textarea>
    {!! $errors->first('content', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sku') ? 'has-error' : ''}}">
    <label for="sku" class="control-label">{{ 'SKU' }}</label>
    <input class="form-control" name="sku" type="text" id="sku" value="{{ isset($slidemenu->sku) ? $slidemenu->sku : old('sku')}}" >
    {!! $errors->first('sku', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('weight') ? 'has-error' : ''}}">
    <label for="weight" class="control-label">{{ 'Weight (Kg)' }}</label>
    <input class="form-control" name="weight" type="number" id="weight" value="{{ isset($slidemenu->weight) ? $slidemenu->weight : old('weight')}}" >
    {!! $errors->first('weight', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('calories') ? 'has-error' : ''}}">
    <label for="calories" class="control-label">{{ 'Calories (Cal)' }}</label>
    <input class="form-control" name="calories" type="number" id="calories" value="{{ isset($slidemenu->calories) ? $slidemenu->calories : old('calories')}}" >
    {!! $errors->first('calories', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('more_content') ? 'has-error' : ''}}">
    <label for="more_content" class="control-label">{{ 'More Description' }}</label>
    <textarea class="form-control" rows="5" name="more_content" type="textarea" id="more_content" >{{ isset($slidemenu->more_content) ? $slidemenu->more_content : old('more_content')}}</textarea>
    {!! $errors->first('more_content', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
