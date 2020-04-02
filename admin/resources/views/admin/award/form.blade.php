<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="description" type="text" id="description" value="{{ isset($award->description) ? $award->description : ''}}" required>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Content' }}</label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content" >{{ isset($award->content) ? $award->content : ''}}</textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
    <label for="year" class="control-label">{{ 'Year' }}</label>
    <input class="form-control" name="year" type="date" id="year" value="{{ isset($award->year) ? $award->year : ''}}" required>
    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    <a class="btn btn-warning" href="{{ url('/admin/award') }}" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
</div>
