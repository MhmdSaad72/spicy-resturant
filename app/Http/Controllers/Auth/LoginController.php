<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\BasicDetail;
use App\NavBar;
use App\SlideMenu;
use App\MainDish;
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
    /*======================================
     Display redirect page after user login
    ========================================*/
    protected function redirectTo()
    {
      if (!Auth::guest() && Auth::user()->hasRole('user')) {
        return route('personal.information' , ['id' => Auth::user()->id]);
      }elseif (!Auth::guest() && Auth::user()->hasRole('admin')) {
        return route('dashboard');
      }
    }
    /*======================================
         Display login page for users
    ========================================*/
    public function index()
    {
      $basicDetail = BasicDetail::first() ?? '' ;
      $navbar = NavBar::first();
      $mainDish = MainDish::first();
      $newDishes = SlideMenu::latest()->take(3)->get();
      if (Auth::check()) {
        $user = User::findOrFail(Auth::user()->id);
        $bookings = $user->bookings->count();
      }else {
        $bookings = 0 ;
      }
      return view('auth.login' , compact('basicDetail' , 'bookings' , 'navbar' , 'newDishes' , 'mainDish'));
    }

    /*======================================
         login function for users
    ========================================*/
    // public function login(Request $request)
    // {
    //   $validator = $this->validate($request , [
    //                   'email' => 'required',
    //                   'password' => 'required',
    //                 ]);
    //
    //   if (Auth::attempt($validator) && Auth::user()->hasRole('user')) {
    //      return redirect()->route('personal.information' , ['id' => Auth::user()->id]);
    //   }else {
    //     Auth::logout();
    //     return redirect()->back()->with('emailError' , 'These credentials do not match our records.')->withInput();
    //   }
    // }

    /*=======================================
         Display login page for admin
    =========================================*/
    public function loginView()
    {
      return view('admin.login');
    }

    protected function loggedOut(Request $request)
    {
        return redirect()->route('login');
    }
}
