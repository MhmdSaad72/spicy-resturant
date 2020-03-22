@extends('adminlte::page')

@section('title', 'Contact us')

@section('content_header')
    <h1>Contact us</h1>
@stop

@section('content')
  @if ($contactus)
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      <a href="{{ url('/admin/contact-us/' . $contactus->id . '/edit') }}" title="Edit Contact Us"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <br/>
                      <br/>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th> Title </th><td> {{ $contactus->title }} </td>
                            </tr>
                            <tr>
                              <th> Description </th><td> {{ $contactus->description }} </td>
                            </tr>
                            <tr>
                              <th> Content </th><td> {{ $contactus->content }} </td>
                            </tr>
                            <tr>
                              <th> Facebook </th><td> {{ $contactus->facebook }} </td>
                            </tr>
                            <tr>
                              <th> Twitter </th><td> {{ $contactus->twitter }} </td>
                            </tr>
                            <tr>
                              <th> Youtube </th><td> {{ $contactus->youtube }} </td>
                            </tr>
                            <tr>
                              <th> Instagram </th><td> {{ $contactus->instagram }} </td>
                            </tr>
                            <tr>
                              <th> place </th><td> {{ $contactus->place }} </td>
                            </tr>
                            <tr>
                              <th> Address </th><td> {{ $contactus->address }} </td>
                            </tr>
                            <tr>
                              <tr>
                                <th> Map directions </th><td> {{ $contactus->map_directions }} </td>
                              </tr>
                              <tr>
                              <th> Image </th><td> <img src="{{ asset('storage/' . $contactus->image)  }}" alt=""> </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endif
@endsection
