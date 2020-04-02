@extends('adminlte::page')

@section('title', 'Award')

@section('content_header')
    <h1>Award</h1>
@stop

@section('content')
  @if ($award)
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  <a class="btn btn-primary" href="{{ url('/admin/award/' . $award->id . '/edit') }}" title="Edit award"><i class="fas fa-pen" aria-hidden="true"></i> Edit</a>

                  <br/>
                  <br/>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th> Title </th><td> {{ $award->description }} </td>
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
  @endif
@endsection
