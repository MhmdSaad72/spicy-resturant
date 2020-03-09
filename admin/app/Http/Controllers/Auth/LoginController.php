<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\BasicDetail;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        if (Auth::check()) {
          $this->redirectTo = route('personal.information' , ['id' => Auth::user()->id]);
        }
    }

    public function index()
    {
      $basicDetail = BasicDetail::first() ?? '' ;
      if (Auth::check()) {
        $user = User::findOrFail(Auth::user()->id);
        $bookings = $user->bookings->count();
      }else {
        $bookings = 0 ;
      }
      return view('auth.login' , compact('basicDetail' , 'bookings'));
    }

    protected function loggedOut(Request $request)
    {
        return redirect()->route('login');
    }
}
