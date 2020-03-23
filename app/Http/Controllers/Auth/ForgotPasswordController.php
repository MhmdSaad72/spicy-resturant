<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\BasicDetail ;
use App\NavBar;
use App\MainDish;
use App\SlideMenu;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
      $basicDetail = BasicDetail::first();
      $navbar = NavBar::first();
      $mainDish = MainDish::first();
      $newDishes = SlideMenu::latest()->take(3)->get();
      return view('auth.passwords.email' , compact('basicDetail' , 'navbar' , 'mainDish' , 'newDishes'));
    }

}
