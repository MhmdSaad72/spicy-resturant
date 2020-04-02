@extends('adminlte::page')

@section('title', 'All clients')

@section('content_header')
    <h1>All clients</h1>
@stop

@section('content')
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                <form method="GET" action="{{ url('/admin/clients') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                  <th>Country</th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach($clients as $item)
                            @if ($item->hasRole('user'))
                              <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->country }}</td>
                              </tr>
                            @endif
                          @endforeach
                          </tbody>
                      </table>
                      <div class="pagination-wrapper"> {!! $clients->appends(['search' => Request::get('search')])->render() !!} </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
