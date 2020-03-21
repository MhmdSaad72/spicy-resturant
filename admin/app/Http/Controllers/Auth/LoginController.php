<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\BasicDetail;
use App\NavBar;
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
    // protected $redirectTo ='booking';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
      if (!Auth::guest() && Auth::user()->hasRole('user')) {
        return route('personal.information' , ['id' => Auth::user()->id]);
      }elseif (!Auth::guest() && Auth::user()->hasRole('admin')) {
        return route('dashboard');
      }
    }

    public function index()
    {
      $basicDetail = BasicDetail::first() ?? '' ;
      $navbar = NavBar::first();
      if (Auth::check()) {
        $user = User::findOrFail(Auth::user()->id);
        $bookings = $user->bookings->count();
      }else {
        $bookings = 0 ;
      }
      return view('auth.login' , compact('basicDetail' , 'bookings' , 'navbar'));
    }

    protected function loggedOut(Request $request)
    {
        return redirect()->route('login');
    }
}
