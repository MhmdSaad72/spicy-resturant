<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\MainDish;
use App\Service;
use App\OurStory;
use App\OurServicesHead;
use App\OurServicesBody;
use App\FeaturDishHead;
use App\FeatureDishBody;
use App\FoodMenu;
use App\Category;
use App\Chef;
use App\MasterChef;
use App\Availability;
use App\Gallary;
use App\Album;
use App\BasicDetail;
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

        $service = Service::first();
        $mainDish = MainDish::first();
        $ourStory = OurStory::first();
        $ourServicesHead = OurServicesHead::first();
        $ourServicesBody = OurServicesBody::all();
        $featurDishHead = FeaturDishHead::first();
        $featurDishBody = FeatureDishBody::all();
        $foodMenu = FoodMenu::first();
        $categories = Category::all();
        $chefHead = MasterChef::first();
        $chefs = Chef::all();
        $availability = Availability::first();
        $availableDays = explode(',' , $availability->availability);
        $start_day = min($availableDays);
        $end_day = max($availableDays);
        $array = [1,2,3,4,5,6,7];
        $closedDays = array_diff($array , $availableDays);
        $availability->start_time = Carbon::parse($availability->start_time)->format('h:i A');
        $availability->end_time = Carbon::parse($availability->end_time)->format('h:i A');
        $gallary = Gallary::first();
        $album = Album::all();
        $basicDetail = BasicDetail::first();
        if (Auth::check()) {
          $user = User::findOrFail(Auth::user()->id);
          $bookings = $user->bookings->count();
        }else {
          $bookings = 0 ;
        }
        return view('pages.home.index', compact('service' , 'mainDish' , 'ourStory' , 'ourServicesHead' , 'ourServicesBody' , 'featurDishHead' , 'featurDishBody' , 'foodMenu' , 'categories' , 'chefHead' , 'chefs' , 'availability' , 'gallary' , 'album' , 'basicDetail' , 'bookings' , 'closedDays' , 'start_day' , 'end_day'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.home.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Home::create($requestData);

        return redirect('pages/home')->with('flash_message', 'Home added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $home = Home::findOrFail($id);

        return view('pages.home.show', compact('home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $home = Home::findOrFail($id);

        return view('pages.home.edit', compact('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $home = Home::findOrFail($id);
        $home->update($requestData);

        return redirect('pages/home')->with('flash_message', 'Home updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Home::destroy($id);

        return redirect('pages/home')->with('flash_message', 'Home deleted!');
    }
}
