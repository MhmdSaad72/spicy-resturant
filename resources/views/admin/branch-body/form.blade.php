<div class="form-group {{ $errors->has('place') ? 'has-error' : ''}}">
    <label for="place" class="control-label">{{ 'Place' }}</label>
    <input class="form-control" name="place" type="text" id="place" value="{{ isset($branchbody->place) ? $branchbody->place : old('place')}}" >
    {!! $errors->first('place', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($branchbody->address) ? $branchbody->address : old('address')}}" >
    {!! $errors->first('address', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($branchbody->phone) ? $branchbody->phone : old('phone')}}" >
    {!! $errors->first('phone', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="email" id="email" value="{{ isset($branchbody->email) ? $branchbody->email : old('email')}}" >
    {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('map_directions') ? 'has-error' : ''}}">
    <label for="map_directions" class="control-label">{{ 'Map directions' }}</label>
    <input class="form-control" name="map_directions" type="text" id="map_directions" value="{{ isset($contactus->map_directions) ? $contactus->map_directions : old('map_directions')}}" >
    {!! $errors->first('map_directions', '<p class="help-block text-danger">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
