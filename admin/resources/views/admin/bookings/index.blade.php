@extends('adminlte::page')

@section('title', 'Bookings')

@section('content_header')
    <h1>Bookings</h1>
@stop

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-9">
              <div class="card">
                  <div class="card-body">
                      {{-- <form method="GET" action="{{ url('/admin/branch-body') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                          <div class="input-group">
                              <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                              <span class="input-group-append">
                                  <button class="btn btn-secondary" type="submit">
                                      <i class="fa fa-search"></i>
                                  </button>
                              </span>
                          </div>
                      </form> --}}

                      <br/>
                      <br/>
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>fullName</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                              @foreach($bookings as $item)
                                  <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $item->fullname }}</td>
                                      <td>{{ $item->email }}</td>
                                      <td>{{ $item->phone }}</td>
                                      <td><a href="{{ url('/admin/bookings/' . $item->id) }}" title="View Booking"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a></td>
                                  </tr>
                              @endforeach
                              </tbody>
                          </table>
                          {{-- <div class="pagination-wrapper"> {!! $branchbody->appends(['search' => Request::get('search')])->render() !!} </div> --}}
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
