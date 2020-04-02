<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\BasicDetail;
use App\NavBar;
use App\SlideMenu;
use App\MainDish;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

    }

    protected function redirectTo()
    {
      if (Auth::check()) {
        return route('personal.information' , ['id' => Auth::user()->id]);
      }
    }


    public function index()
    {
      $basicDetail = BasicDetail::first() ?? '' ;
      $navbar = NavBar::first();
      $mainDish = MainDish::first();
      $newDishes = SlideMenu::latest()->take(3)->get();
      $bookings = 0 ;
      return view('auth.register' , compact('basicDetail' , 'bookings' , 'navbar' , 'newDishes' , 'mainDish'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed' , 'max:255'],
            'country' => 'required|max:255',
            'phone' => 'required|max:255'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'country' => $data['country'],
            'phone' => $data['phone'],
        ]);
        $user->assignRole('user');
        return $user ;
    }
}
