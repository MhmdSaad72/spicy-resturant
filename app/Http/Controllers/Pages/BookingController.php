<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Booking;
use App\BasicDetail ;
use App\Availability ;
use App\BasicReservation;
use App\NavBar;
use App\MainDish;
use App\SlideMenu;
use App\Mail\ConfirmationMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use \Carbon\Carbon;
use App\User;

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
        $navbar = NavBar::first();
        $mainDish = MainDish::first();
        $newDishes = SlideMenu::latest()->take(3)->get();
        $availableDays = explode(',' , $availability->availability);
        $start_day = min($availableDays);
        $end_day = max($availableDays);
        $array = [1,2,3,4,5,6,7];
        $closedDays = array_diff($array , $availableDays);
        $basicDetail = BasicDetail::first();
        if (Auth::check()) {
          $user = User::findOrFail(Auth::user()->id);
          $bookings = $user->bookings->count();
        }else {
          $bookings = 0 ;
        }
        if (Auth::check() && Auth::user()->hasRole('admin')) {
          abort(403);
        }
        return view('pages.booking.index', compact('availability' , 'basicDetail' , 'bookings' , 'start_day' , 'closedDays' , 'end_day' , 'navbar' , 'mainDish' , 'newDishes'));
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
       $navbar = NavBar::first();
       $mainDish = MainDish::first();
       $newDishes = SlideMenu::latest()->take(3)->get();
       $booking->date = Carbon::parse($booking->date)->format('l d M Y');
       $booking->time = Carbon::parse($booking->time)->format('h:i A');
       if (Auth::check()) {
         $user = User::findOrFail(Auth::user()->id);
         $bookings = $user->bookings->count();
       }else {
         $bookings = 0 ;
       }
       return view('pages.booking.confirmation', compact('basicDetail' , 'booking' , 'bookings' , 'navbar' , 'newDishes' , 'mainDish'));
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
        $navbar = NavBar::first();
        $mainDish = MainDish::first();
        $newDishes = SlideMenu::latest()->take(3)->get();
        if (Auth::check()) {
          $user = User::findOrFail(Auth::user()->id);
          $bookings = $user->bookings->count();
        }else {
          $bookings = 0 ;
        }
        return view('pages.booking.cancellation', compact('basicDetail' , 'booking' , 'bookings' , 'navbar' , 'newDishes' , 'mainDish'));
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
      * display cancel page after cancellation
      *
      * @return \Illuminate\View\View
      */
      public function cancelled()
      {
        $basicDetail = BasicDetail::first();
        $navbar = NavBar::first();
        $mainDish = MainDish::first();
        $newDishes = SlideMenu::latest()->take(3)->get();
        return view('pages.booking.cancelled', compact('basicDetail' , 'navbar' , 'newDishes' , 'mainDish'));
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

        // basic details for every reservation
        $basicReserve = BasicReservation::first();
        $availability = Availability::first();
        $availableDays = explode(',' , $availability->availability);
        $startTime =  Carbon::parse($availability->start_time)->format('H:i');
        $endTime =  Carbon::parse($availability->end_time)->format('H:i');

        // validation for booking form
        $this->validate($request, [
          'phone' => 'required|max:255',
          'smokingArea' => 'required|max:255',
          'peopleNumber' => 'required|integer|gte:0|max:' . $basicReserve->maxPeople(),
          'tablesNumber' => 'required|integer|gte:0|max:' . $basicReserve->tables,
          'date' => 'required|date|after:' . Carbon::now(),
          'time' => 'required|date_format:H:i|after:' . $startTime . '|before:' . $endTime,
          'specialrequest' => 'max:65535',
        ]);

        $requestData = $request->all();
        // convert request date to correct format
        $requestData['date'] = Carbon::parse($request->date)->format('Y-m-d');
        $requestData['booking_id'] = Str::random(9) ;

        // available tables in chosen time
        $tables = Booking::where('time' , $request->time)->where('date' ,$requestData['date'] )->sum('tablesNumber');
        $availableTables = ($basicReserve->tables) - ($tables) ;
        if ($request->tablesNumber > $availableTables) {
          return redirect()->back()->with('timeError' , 'we only have ' . $availableTables . ' tables at this time pick another time')->withInput();
        }

        // available chairs for chosen tables
        $chairs = ($requestData['tablesNumber']) * ($basicReserve->chairs) ;
        if ($requestData['peopleNumber'] > $chairs) {
          return redirect()->back()->with('peopleError' , 'Every table has a maximum number of ' . $basicReserve->chairs . ' people')->withInput();
        }

        // available days
        $date  = Carbon::parse($request->date)->format('N');
        if (!in_array($date , $availableDays)) {
          return redirect()->back()->with('dateError' , 'Sorry we are closed this day')->withInput();
        }

        // condition for time
        $minutes = Carbon::parse($request->time)->format('i');
        if ($minutes != 0) {
          return redirect()->back()->with('timeError' , 'we only accept hours, don\'t pick minutes')->withInput();
        }

        // if user does not have account
        if (Auth::guest()) {
            $this->validate($request , [
              'fullname' => 'required|max:255',
              'email' => 'required|email|max:255',
            ]);
        }


        // if user has acount
        if (Auth::check()) {
          $requestData['user_id'] = Auth::user()->id ;
          $requestData['email'] = Auth::user()->email;
          $requestData['fullname'] = Auth::user()->name;
        }

        // send mail after confirm booking
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

     public function bookings()
     {
         $id = Auth::user()->id ;
         $user = User::findOrFail($id);
         $basicDetail = BasicDetail::first();
         $navbar = NavBar::first();
         $mainDish = MainDish::first();
         $newDishes = SlideMenu::latest()->take(3)->get();
         if (Auth::check()) {
           $user = User::findOrFail(Auth::user()->id);
           $bookings = $user->bookings->count();
         }else {
           $bookings = 0 ;
         }
         return view('pages.booking.bookings' , compact('user' , 'basicDetail' , 'bookings' , 'navbar' , 'mainDish' , 'newDishes'));
     }

     /**
      * display edit page for booking
      *
      * @return \Illuminate\View\View
      */

      public function edit($id)
      {
        //  booking details for edit page
        $booking = Booking::findOrFail($id);
        $booking->date = Carbon::parse($booking->date)->format('d/m/Y');
        $booking->time = Carbon::parse($booking->time)->format('H:i');
        // opening and closed days
        $availability = Availability::first();
        $navbar = NavBar::first();
        $mainDish = MainDish::first();
        $newDishes = SlideMenu::latest()->take(3)->get();
        $availableDays = explode(',' , $availability->availability);
        $start_day = min($availableDays);
        $end_day = max($availableDays);
        $array = [1,2,3,4,5,6,7];
        $closedDays = array_diff($array , $availableDays);
        // bookings number for user
        if (Auth::check()) {
          $user = User::findOrFail(Auth::user()->id);
          $bookings = $user->bookings->count();
        }else {
          $bookings = 0 ;
        }
        return view('pages.booking.edit' , compact('booking' , 'availability' , 'start_day' , 'end_day' , 'closedDays' , 'bookings' , 'navbar' , 'newDishes' , 'mainDish'));
      }

      /**
       * Update booking method for every user.
       *
       * @param \Illuminate\Http\Request $request
       *
       * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
       */

      public function update(Request $request , $id)
      {

        $booking = Booking::findOrFail($id);
        // basic details for every reservation
        $basicReserve = BasicReservation::first();
        // opening and closed days
        $availability = Availability::first();
        $availableDays = explode(',' , $availability->availability);
        $startTime =  Carbon::parse($availability->start_time)->format('H:i');
        $endTime =  Carbon::parse($availability->end_time)->format('H:i');
        // validation for edit booking form
        $this->validate($request , [
          'phone' => 'required|max:255',
          'smokingArea' => 'required|max:255',
          'peopleNumber' => 'required|integer|gte:0|max:' . $basicReserve->maxPeople(),
          'tablesNumber' => 'required|integer|gte:0|max:' . $basicReserve->tables,
          'date' => 'required|date|after:' . Carbon::now(),
          'time' => 'required|date_format:H:i|after:' . $startTime . '|before:' . $endTime,
          'specialrequest' => 'max:65535',
        ]);

        $requestData = $request->all();
        // convert request date to correct format
        $requestData['date'] = Carbon::parse($request->date)->format('Y-m-d');
        $requestData['booking_id'] = Str::random(9) ;

        // available tables in chosen time
        $tables = Booking::where('time' , $request->time)->where('date' ,$requestData['date'] )->where('id' , '!=' , $id)->sum('tablesNumber');
        $availableTables = ($basicReserve->tables) - ($tables) ;
        if ($request->tablesNumber > $availableTables) {
          return redirect()->back()->with('timeError' , 'we only have ' . $availableTables . ' tables at this time pick another time')->withInput();
        }

        // available chairs for chosen tables
        $chairs = ($requestData['tablesNumber']) * ($basicReserve->chairs) ;
        if ($requestData['peopleNumber'] > $chairs) {
          return redirect()->back()->with('peopleError' , 'Every table has a maximum number of ' . $basicReserve->chairs . ' people')->withInput();
        }

        // available days
        $date  = Carbon::parse($request->date)->format('N');
        if (!in_array($date , $availableDays)) {
          return redirect()->back()->with('dateError' , 'Sorry we are closed this day')->withInput();
        }


        $requestData['user_id'] = Auth::user()->id ;
        $requestData['fullname'] = Auth::user()->name ;
        $requestData['email'] = Auth::user()->email ;


        $booking->update($requestData);
        if ($booking) {
          Mail::to($booking->email)->send(new ConfirmationMail($booking));
        }

        return redirect()->route('booking.confirm' , ['id' => $booking->id]);

      }



}
