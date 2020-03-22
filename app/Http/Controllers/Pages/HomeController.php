<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\MainDish;
use App\Service;
use App\OurStory;
use App\OurServicesBody;
use App\FoodMenu;
use App\Category;
use App\Chef;
use App\Availability;
use App\Album;
use App\BasicDetail;
use App\SlideMenu;
use App\NavBar;
use \Carbon\Carbon ;
use Auth;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $navbar = NavBar::first();
        $service = Service::first();
        $mainDish = MainDish::first();
        $ourStory = OurStory::first();
        $ourServicesBody = OurServicesBody::all();
        $foodMenu = FoodMenu::first();
        $categories = Category::all();
        $dishes = SlideMenu::where('featured', 1)->get();
        $chefs = Chef::all();
        $availability = Availability::first();
        $availableDays = explode(',' , $availability->availability);
        $start_day = min($availableDays);
        $end_day = max($availableDays);
        $array = [1,2,3,4,5,6,7];
        $closedDays = array_diff($array , $availableDays);
        $availability->start_time = Carbon::parse($availability->start_time)->format('h:i A');
        $availability->end_time = Carbon::parse($availability->end_time)->format('h:i A');
        $album = Album::latest()->take(8)->get();
        $basicDetail = BasicDetail::first();
        if (Auth::check()) {
          $user = User::findOrFail(Auth::user()->id);
          $bookings = $user->bookings->count();
        }else {
          $bookings = 0 ;
        }
        return view('pages.home.index', compact('service' , 'mainDish' , 'ourStory' , 'ourServicesBody' , 'foodMenu' , 'categories' , 'chefs' , 'availability' , 'album' , 'basicDetail' , 'bookings' , 'closedDays' , 'start_day' , 'end_day' , 'dishes' , 'navbar'));
    }

}
