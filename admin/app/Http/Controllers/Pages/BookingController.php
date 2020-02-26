<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Booking;
use App\BasicDetail ;
use App\Availability ;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $availability = Availability::first();
        $basicDetail = BasicDetail::first();
        return view('pages.booking.index', compact('availability' , 'basicDetail'));
    }
    /**
     * Show the confirmation booking page.
     *
     * @return \Illuminate\View\View
     */

     public function confirmation($id)
     {
       $basicDetail = BasicDetail::first();
       $booking = Booking::findOrFail($id);
       $booking->date = \Carbon\Carbon::parse($booking->date)->format('l d M Y');
       $booking->time = \Carbon\Carbon::parse($booking->time)->format('h:i A');
       return view('pages.booking.confirmation', compact('basicDetail' , 'booking'));
     }

     /**
      * Show the confirmation booking page.
      *
      * @return \Illuminate\View\View
      */

      public function cancellation()
      {
        $basicDetail = BasicDetail::first();
        return view('pages.booking.cancellation', compact('basicDetail'));
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'fullname' => 'required|max:255',
          'email' => 'required|email|max:255|unique:bookings',
          'phone' => 'required|max:255|unique:bookings',
          'smokingArea' => 'required|max:255',
          'peopleNumber' => 'required|max:255',
          'tablesNumber' => 'required|max:255',
          'date' => 'required|date_format:d/m/Y|after:' . \Carbon\Carbon::now(),
          'time' => 'required|date_format:H:i',
          'specialrequest' => 'max:65535',
        ]);

        $requestData = $request->all();
        $replaced = Str::replaceArray('/', ['-','-'], $request->date);
        $requestData['date'] = \Carbon\Carbon::parse($replaced)->format('Y-m-d');
        $requestData['booking_id'] = Str::random(9) ;

        $booking = Booking::create($requestData);

        return redirect()->route('booking.confirm' , ['id' => $booking->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);

        return view('pages.booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);

        return view('pages.booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $booking = Booking::findOrFail($id);
        $booking->update($requestData);

        return redirect('pages/booking')->with('flash_message', 'Booking updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Booking::destroy($id);

        return redirect('pages/booking')->with('flash_message', 'Booking deleted!');
    }
}
