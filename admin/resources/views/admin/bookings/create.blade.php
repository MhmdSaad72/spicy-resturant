@extends('adminlte::page')

@section('title', 'Create New Booking')

@section('content_header')
    <h1>Create New Booking</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/admin/bookings') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        <form method="POST" action="{{route('booking.store')}}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                              <div class="form-group {{ $errors->has('fullname') ? 'has-error' : ''}}">
                                <label for="fullname" class="control-label">{{ 'Full Name' }}</label>
                                <input class="form-control" name="fullname" type="text" id="fullname" value="{{ old('fullname') }}" >
                                {!! $errors->first('fullname', '<p class="help-block text-danger">:message</p>') !!}
                              </div>
                              <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                <label for="email" class="control-label">{{ 'Email Address' }}</label>
                                <input class="form-control" placeholder="Emaill address e.g. Jason@example.com" name="email" type="email" id="email" value="{{ old('email') }}" >
                                {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
                              </div>
                              <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                                <label for="phone" class="control-label">{{ 'Phone Number' }}</label>
                                <input class="form-control" placeholder="e.g. 654856974" name="phone" type="tel" id="phone" value="{{ old('phone') }}" >
                                {!! $errors->first('phone', '<p class="help-block text-danger">:message</p>') !!}
                              </div>
                              <div class="form-group {{ $errors->has('smokingArea') ? 'has-error' : ''}}">
                                  <label for="smokingArea" class="control-label">Smoking area</label>
                                  <select name="smokingArea" class="form-control" id="smokingArea" >
                                    <option value="" selected disabled>Select smoking area</option>
                                    <option value="0" {{'0' == old('smokingArea') ? 'selected' : ''}}>Smoking area</option>
                                    <option value="1" {{'1' == old('smokingArea') ? 'selected' : ''}}>Non-smoking area</option>

                              </select>
                                  {!! $errors->first('smokingArea', '<p class="help-block text-danger">:message</p>') !!}
                              </div>
                              <div class="form-group {{ $errors->has('peopleNumber') ? 'has-error' : ''}}">
                                <label for="peopleNumber" class="control-label">{{ 'How many people' }}</label>
                                <input class="form-control" placeholder="How many people will come" name="peopleNumber" type="number" id="peopleNumber" value="{{ old('peopleNumber') }}" >
                                {!! $errors->first('peopleNumber', '<p class="help-block text-danger">:message</p>') !!}
                                {!! session('peopleError') ? '<p class="help-block text-danger">'. session('peopleError').'</p>' : '' !!}
                              </div>
                              <div class="form-group {{ $errors->has('tablesNumber') ? 'has-error' : ''}}">
                                <label for="tablesNumber" class="control-label">{{ 'How many tables' }}</label>
                                <input class="form-control" placeholder="How many tables needed" name="tablesNumber" type="number" id="tablesNumber" value="{{ old('tablesNumber') }}" >
                                {!! $errors->first('tablesNumber', '<p class="help-block text-danger">:message</p>') !!}
                              </div>
                              <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                                <label for="date" class="control-label">{{ 'Desired Date' }}</label>
                                <input class="form-control" placeholder="Pick your desired date" name="date" type="date" id="date" value="{{ old('date') }}" >
                                {!! $errors->first('date', '<p class="help-block text-danger">:message</p>') !!}
                                {!! session('dateError') ? '<p class="help-block text-danger">'. session('dateError').'</p>' : '' !!}
                              </div>
                              <div class="form-group {{ $errors->has('time') ? 'has-error' : ''}}">
                                <label for="time" class="control-label">{{ 'Desired Date' }}</label>
                                <input class="form-control" placeholder="Pick your desired time" name="time" type="time" id="time" value="{{ old('time') }}" >
                                {!! $errors->first('time', '<p class="help-block text-danger">:message</p>') !!}
                                {!! session('timeError') ? '<p class="help-block text-danger">'. session('timeError').'</p>' : '' !!}
                              </div>

                              <div class="form-group ">
                                <label class="label-optional m-0" for="specialRequest">Spcial Request</label>
                                <textarea class="form-control form-control-lg" name="specialrequest" id="specialRequest" placeholder="If you have any extra request, let us know" rows="5" >{{old('specialrequest')}}</textarea>
                              </div>

                              <div class="form-group ">
                                <button class="btn btn-primary px-5" type="submit">Book a Table</button>
                              </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
  <script src="{{asset('js/front.js')}}"></script>
@endsection
