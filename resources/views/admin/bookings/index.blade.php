@extends('adminlte::page')

@section('title', 'Bookings')

@section('content_header')
    <h1>Bookings</h1>
@stop

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                    <a href="{{ url('/admin/bookings/create') }}" class="btn btn-success btn-sm" title="Add New Booking">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                      <form method="GET" action="{{ url('/admin/bookings') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                          <div class="input-group">
                              <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                              <span class="input-group-append">
                                  <button class="btn btn-secondary" type="submit">
                                      <i class="fa fa-search"></i>
                                  </button>
                              </span>
                          </div>
                      </form>

                      <br/>
                      <br/>
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>fullName</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                      <th>Date</th>
                                      <th>Time</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                              @foreach($bookings as $item)
                                  <tr>
                                      <td>{{ $item->fullname }}</td>
                                      <td>{{ $item->email }}</td>
                                      <td>{{ $item->phone }}</td>
                                      <td>{{ $item->date }}</td>
                                      <td>{{ $item->time }}</td>
                                      <td>
                                        <a href="{{ url('/admin/bookings/' . $item->id) }}" title="View Booking"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <form method="POST" action="{{ url('/admin/bookings' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-warning btn-sm" title="Cancel Booking" onclick="return confirm(&quot;Confirm Cancel?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Cancel</button>
                                        </form>
                                      </td>
                                  </tr>
                              @endforeach
                              </tbody>
                          </table>
                          <div class="pagination-wrapper"> {!! $bookings->appends(['search' => Request::get('search')])->render() !!} </div>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
