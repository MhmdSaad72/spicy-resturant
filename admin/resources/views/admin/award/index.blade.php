@extends('adminlte::page')

@section('title', 'Award')

@section('content_header')
    <h1>Award</h1>
@stop

@section('content')
  @if ($award)
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      <a href="{{ url('/admin/award/' . $award->id . '/edit') }}" title="Edit award"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <br/>
                      <br/>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th> Description </th><td> {{ $award->description }} </td>
                            </tr>
                            <tr>
                              <th> Content </th><td> {{ $award->content }} </td>
                            </tr>
                            <tr>
                              <th> Year </th><td> {{ \Carbon\Carbon::parse($award->year)->format('Y') }} </td>
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
