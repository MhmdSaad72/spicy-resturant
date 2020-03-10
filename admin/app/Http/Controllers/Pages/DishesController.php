<?php

namespace App\Http\Controllers\Pages;

use App\BasicDetail;
use App\SlideMenu;
use App\DishReview;
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
        $user= DishReview::where('user_id' , Auth::user()->id)->first();
      }else {
        $bookings = 0 ;
      }
      $similarDishes = SlideMenu::where('id', '!=' , $id)->where('category_id' , $dish->category_id)->orderBy('created_at' , 'desc')->take(3)->get();

      $reviews = DishReview::where('dish_id' , $dish->id)->get();
      return view('pages.dishes.show' , compact('basicDetail' , 'dish' , 'similarDishes' , 'bookings' , 'reviews' , 'user'));
    }

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
