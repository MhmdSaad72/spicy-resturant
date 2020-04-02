<?php

namespace App\Http\Controllers\Pages;

use App\BasicDetail;
use App\SlideMenu;
use App\DishReview;
use App\NavBar;
use App\MainDish;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DishesController extends Controller
{
    /*====================================
            display dish page
    ======================================*/
    public function show($id)
    {
      $basicDetail = BasicDetail::first();
      $dish = SlideMenu::findOrFail($id);
      $navbar = NavBar::first();
      $mainDish = MainDish::first();
      $newDishes = SlideMenu::latest()->take(3)->get();
      if (Auth::check()) {
        $bookings = Auth::user()->userBookings()->count();
        $user= DishReview::where('dish_id' , $id)->where('user_id' , Auth::user()->id)->first();
      }else {
        $bookings = 0 ;
      }
      $similarDishes = SlideMenu::where('id', '!=' , $id)->where('category_id' , $dish->category_id)->orderBy('created_at' , 'desc')->take(3)->get();

      $reviews = DishReview::where('dish_id' , $dish->id)->latest()->take(2)->get();
      $reviewCount = DishReview::where('dish_id' , $dish->id)->count();
      return view('pages.dishes.show' , compact('basicDetail' , 'dish' , 'similarDishes' , 'bookings' , 'reviews' , 'user' , 'reviewCount' , 'navbar' , 'newDishes' , 'mainDish'));
    }

    /*====================================
      Store dish review method for user
    ======================================*/
    public function review(Request $request , $id)
    {
      $this->validate($request , [
        'dishStars' => 'required',
        'dishReviewBody' => 'required' ,
      ]);
      $requestData = $request->all();
      $dish = SlideMenu::findOrFail($id);
      $requestData['dish_id'] = $dish->id ;
      if (Auth::check()) {
        $requestData['user_id'] = Auth::user()->id ;
      }

      DishReview::create($requestData);
      return redirect()->back();
    }
}
