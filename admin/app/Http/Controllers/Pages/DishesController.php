<?php

namespace App\Http\Controllers\Pages;

use App\BasicDetail;
use App\SlideMenu;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DishesController extends Controller
{
    public function show($id)
    {
      $basicDetail = BasicDetail::first();
      $dish = SlideMenu::findOrFail($id);
      if (Auth::check()) {
        $bookings = Auth::user()->bookings->count();
      }else {
        $bookings = 0 ;
      }
      $similarDishes = SlideMenu::where('id', '!=' , $id)->where('category_id' , $dish->category_id)->orderBy('created_at' , 'desc')->take(3)->get();
      return view('pages.dishes.show' , compact('basicDetail' , 'dish' , 'similarDishes' , 'bookings'));
    }
}
