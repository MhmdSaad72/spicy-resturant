<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Booking;
use App\BasicDetail ;
use App\Availability ;
use App\Mail\ConfirmationMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

      public function cancellation($id)
      {
        $booking = Booking::findOrFail($id);
        $basicDetail = BasicDetail::first();
        return view('pages.booking.cancellation', compact('basicDetail' , 'booking'));
      }

      /**
       * confirm booking cancellation method.
       *
       * @param \Illuminate\Http\Request $request
       *
       * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
       */

       public function confirmCancel(Request $request , $id)
       {
          $this->validate($request, [
            'cancellationCode' => 'required|max:255',
          ]);
          $requestData = $request->cancellationCode;

         $booking = Booking::findOrFail($id);
         if ($requestData == $booking->booking_id)
         {
           Booking::destroy($id);
           return redirect()->route('booking.cancelled');
         }else {
           return redirect()->back()->with('error','We don\'t have any bookings with this ID')->withInput();
         }

       }


     /**
      * confirm booking cancellation method.
      *
      * @param \Illuminate\Http\Request $request
      *
      * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
      */
      public function cancelled()
      {
        $basicDetail = BasicDetail::first();
        return view('pages.booking.cancelled', compact('basicDetail'));
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
          'email' => 'required|email|max:255',
          'phone' => 'required|max:255',
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
        if ($booking) {
          Mail::to($booking->email)->send(new ConfirmationMail($booking));
        }

        return redirect()->route('booking.confirm' , ['id' => $booking->id]);
    }

    /**
     * Show admin bookings details.
     *
     * @return \Illuminate\View\View
     */

     public function bookings($id)
     {
       return view('pages.booking.bookings');
     }



}
