<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Booking;
use App\BasicReservation;
use DB;

class BookingsController extends Controller
{
    public function index()
    {
      $bookings = Booking::all();
      return view('admin.bookings.index' , compact('bookings'));
    }

    public function show($id)
    {
      $booking = Booking::findOrFail($id);
      return view('admin.bookings.show' , compact('booking'));
    }

    public function view()
    {
      $basicReserve = BasicReservation::first();
      return view('admin.bookings.view' , compact('basicReserve'));
    }

    public function edit($id)
    {
      $basicReserve = BasicReservation::findOrFail($id);
      return view('admin.bookings.edit' , compact('basicReserve'));
    }

    public function update(Request $request , $id)
    {
      $basicReserve = BasicReservation::findOrFail($id);

      $this->validate($request , [
        'tables' => 'required|gte:0',
        'chairs' => 'required|gte:0'
      ]);

      $requestData = $request->all();
      $basicReserve->update($requestData);

      return redirect()->route('reservation.view');
    }
}
