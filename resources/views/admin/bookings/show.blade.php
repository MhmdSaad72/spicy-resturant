@extends('adminlte::page')

@section('title', 'Booking')

@section('content_header')
    <h1>Booking</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/admin/bookings') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        {{-- <form method="POST" action="{{ url('admin/branchbody' . '/' . $branchbody->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete BranchBody" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form> --}}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                      <th> fullName </th><td> {{ $booking->fullname }} </td>
                                    </tr>
                                    <tr>
                                      <th> Email </th><td> {{ $booking->email }} </td>
                                    </tr>
                                    <tr>
                                      <th> Phone </th><td> {{ $booking->phone }} </td>
                                    </tr>
                                    <tr>
                                      <th> Smoking Area </th><td> {{ $booking->smokingArea }} </td>
                                    </tr>
                                    <tr>
                                      <th> People Number </th><td> {{ $booking->peopleNumber }} </td>
                                    </tr>
                                    <tr>
                                      <th> Tables Number </th><td> {{ $booking->tablesNumber }} </td>
                                    </tr>
                                    <tr>
                                      <th> Date </th><td> {{ $booking->date }} </td>
                                    </tr>
                                    <tr>
                                      <th> Time </th><td> {{ $booking->time }} </td>
                                    </tr>
                                    <tr>
                                      <th> Booking Id </th><td> {{ $booking->booking_id }} </td>
                                    </tr>
                                    <tr>
                                      <th> Special Request </th><td> {{ $booking->specialrequest }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
