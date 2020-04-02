@extends('adminlte::page')

@section('title', 'Main Dish Section')

@section('content_header')
    <h1>Main Dish Section</h1>
@stop

@section('content')
  @if ($maindish)
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  <a class="btn btn-primary" href="{{ url('/admin/main-dish/' . $maindish->id . '/edit') }}" title="Edit Main Dish"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>

                  <br/>
                  <br/>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th> Dish name</th><td> {{ $maindish->dish->title }} </td>
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
