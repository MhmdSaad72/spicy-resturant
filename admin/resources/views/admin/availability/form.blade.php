<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($availability->title) ? $availability->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <input class="form-control" name="description" type="text" id="description" value="{{ isset($availability->description) ? $availability->description : ''}}" >
    {!! $errors->first('description', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('start_day') ? 'has-error' : ''}}">
    <label for="start_day" class="control-label">{{ 'Start Day' }}</label>
    <select name="start_day" class="form-control" id="start_day" >
      <option value="" selected disabled>{{'Select start day'}}</option>
      @for ($i=1; $i <= 7; $i++)
        <option value="{{$i}}"{{$i == $availability->start_day ? 'selected': ''}}>{{$availability->getDayAttribute($i)}}</option>
      @endfor

    </select>
        {!! $errors->first('start_day', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('start_time') ? 'has-error' : ''}}">
    <label for="start_time" class="control-label">{{ 'Start Time' }}</label>
    <input class="form-control" name="start_time" type="time" id="start_time" value="{{ isset($availability->start_time) ? $availability->start_time : old('start_time')}}" >
    {!! $errors->first('start_time', '<p class="help-block text-danger">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('end_day') ? 'has-error' : ''}}">
    <label for="end_day" class="control-label">{{ 'End Day' }}</label>
    <select name="end_day" class="form-control" id="end_day" >
      <option value="" selected disabled>{{'Select end day'}}</option>
      @for ($i=1; $i <= 7; $i++)
        <option value="{{$i}}"{{$i == $availability->end_day ? 'selected': ''}}>{{$availability->getDayAttribute($i)}}</option>
      @endfor

    </select>
        {!! $errors->first('end_day', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('end_time') ? 'has-error' : ''}}">
    <label for="end_time" class="control-label">{{ 'End Time' }}</label>
    <input class="form-control" name="end_time" type="time" id="end_time" value="{{ isset($availability->end_time) ? $availability->end_time : old('end_time')}}" >
    {!! $errors->first('end_time', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
