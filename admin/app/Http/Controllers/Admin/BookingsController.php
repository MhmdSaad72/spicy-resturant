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
    public function index(Request $request)
    {
      $keyword = $request->get('search');
      $perPage = 20;

      if (!empty($keyword)) {
          $bookings = Booking::where('fullname', 'LIKE', "%$keyword%")
              ->orWhere('email', 'LIKE', "%$keyword%")
              ->orWhere('phone', 'LIKE', "%$keyword%")
              ->latest()->paginate($perPage);
      } else {
          $bookings = Booking::latest()->paginate($perPage);
      }
      return view('admin.bookings.index' , compact('bookings'));
    }

    public function show($id)
    {
      $booking = Booking::findOrFail($id);
      return view('admin.bookings.show' , compact('booking'));
    }

    public function create()
    {
      return view('admin.bookings.create');
    }
    public function store()
    {
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

    public function destroy($id)
    {
      $booking = Booking::findOrFail($id);
      Booking::destroy($id);
      return redirect()->back()->with('flash_message' , 'Booking cancelled successfully!');
    }
}
