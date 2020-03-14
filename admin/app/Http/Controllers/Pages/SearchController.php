<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\SlideMenu;
use App\BasicDetail;
use App\NavBar;
use Auth;

class SearchController extends Controller
{
    public function index(Request $request)
    {
      $keyword = $request->get('search');

      if (!empty($keyword)) {
          $dishes = SlideMenu::where('title', 'LIKE', "%$keyword%")
              ->orWhere('price', 'LIKE', "%$keyword%")
              ->orWhere('content', 'LIKE', "%$keyword%")
              ->orWhere('sku', 'LIKE', "%$keyword%")
              ->orWhere('weight', 'LIKE', "%$keyword%")
              ->orWhere('calories', 'LIKE', "%$keyword%")
              ->orWhere('more_content', 'LIKE', "%$keyword%")
              ->get();
      } else {
          $dishes = null;
      }
      $basicDetail = BasicDetail::first();
      $navbar = NavBar::first();
      if (Auth::check()) {
        $bookings = Auth::user()->bookings->count();
      }else {
        $bookings = 0 ;
      }

      return view('pages.search.index', compact('dishes' , 'basicDetail' , 'bookings' , 'navbar'));
    }
}
