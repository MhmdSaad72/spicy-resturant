<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Menu;
use App\FoodMenu;
use App\Category;
use App\BasicDetail;
use App\NavBar;
use App\SlideMenu;
use App\MainDish;
use App\User;
use Auth;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $foodMenu = FoodMenu::first();
        $categories = Category::all();
        $navbar = NavBar::first();
        $mainDish = MainDish::first();
        $newDishes = SlideMenu::latest()->take(3)->get();
        $basicDetail = BasicDetail::first();
        if (Auth::check()) {
          $user = User::findOrFail(Auth::user()->id);
          $bookings = $user->userBookings()->count();
        }else {
          $bookings = 0 ;
        }
        return view('pages.menus.index', compact('foodMenu' , 'categories' , 'basicDetail' , 'bookings' , 'navbar' , 'newDishes' , 'mainDish'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $foodMenu = FoodMenu::first();
        $categories = Category::all();
        $basicDetail = BasicDetail::first();
        $navbar = NavBar::first();
        $mainDish = MainDish::first();
        $newDishes = SlideMenu::latest()->take(3)->get();
        if (Auth::check()) {
          $user = User::findOrFail(Auth::user()->id);
          $bookings = $user->userBookings()->count();
        }else {
          $bookings = 0 ;
        }

        return view('pages.menus.show', compact('foodMenu' , 'categories' , 'basicDetail' , 'bookings' ,'navbar' , 'mainDish' , 'newDishes'));
    }
}
