<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\About;
use App\AboutU;
use App\Chef;
use App\Album;
use App\BasicDetail;
use App\Philosophy;
use App\Statistic;
use App\Award;
use App\AwardsAccordion;
use App\Availability;
use App\AboutService;
use App\NavBar;
use App\MainDish;
use App\SlideMenu;
use \Carbon\Carbon ;
use Auth;
use App\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $aboutUs = AboutU::first();
        $chefs = Chef::all();
        $album = Album::all();
        $basicDetail = BasicDetail::first();
        $philosophy = Philosophy::first();
        $statistics = Statistic::all();
        $awardsaccordion = AwardsAccordion::all();
        $award = Award::first();
        $navbar = NavBar::first();
        $mainDish = MainDish::first();
        $newDishes = SlideMenu::latest()->take(3)->get();
        if (Auth::check()) {
          $user = User::findOrFail(Auth::user()->id);
          $bookings = $user->bookings->count();
        }else {
          $bookings = 0 ;
        }
        return view('pages.about.index', compact('aboutUs' , 'chefs'  , 'album', 'basicDetail' , 'philosophy' , 'statistics' , 'award' , 'bookings' , 'navbar' , 'awardsaccordion' , 'newDishes' , 'mainDish'));
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
        $aboutUs = AboutU::first();
        $album = Album::all();
        $basicDetail = BasicDetail::first();
        $philosophy = Philosophy::first();
        $aboutservices = AboutService::all();
        $availability = Availability::first();
        $navbar = NavBar::first();
        $mainDish = MainDish::first();
        $newDishes = SlideMenu::latest()->take(3)->get();
        $availableDays = explode(',' , $availability->availability);
        $availability->start_time = Carbon::parse($availability->start_time)->format('h:i A');
        $availability->end_time = Carbon::parse($availability->end_time)->format('h:i A');
        $start_day = min($availableDays);
        $end_day = max($availableDays);
        $array = [1,2,3,4,5,6,7];
        $closedDays = array_diff($array , $availableDays);
        if (Auth::check()) {
          $user = User::findOrFail(Auth::user()->id);
          $bookings = $user->bookings->count();
        }else {
          $bookings = 0 ;
        }
        return view('pages.about.show', compact('aboutUs' , 'album' , 'basicDetail' , 'philosophy' , 'availability' , 'aboutservices' , 'bookings' , 'start_day' , 'end_day' , 'closedDays' , 'navbar' , 'newDishes' , 'mainDish'));
    }

}
