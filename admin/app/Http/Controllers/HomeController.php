<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Booking;
use App\SlideMenu;
use App\Review;
use App\Album;
use App\BasicReservation;
use App\DishReview;
use App\BranchBody;
use App\Baristum;
use App\Waiter;
use App\Chef;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      // number of registed users
      $userCount = User::whereHas('roles', function($query) {
            $query->where('name', 'user');
        })->count();

      // number of confirmed bookings
      $now = \Carbon\Carbon::now();
      $bookingCount = Booking::where('date' , '>=' , $now)->count();

      // average of total review
      $reviewCount = Review::count();
      $stars = Review::sum('stars');
      $reviewAverage = $stars ? intval($stars / $reviewCount) : 0 ;
      $reviews =  $stars ? $this->getStarsAttribute($reviewAverage) : 'No reviews yet!' ;

      // number of tables
      $disheCount = SlideMenu::count();
      $tables = BasicReservation::first();
      $tableCount = $tables ? $tables->tables : 0 ;

      // number of gallery
      $galleryCount = Album::count();

      // latest user review
      $latestReview =  Review::latest()->first();

      // top dish in review
      $topReview = $this->topDishReview();
      $topDishReview =SlideMenu::where('id' , $topReview['id'])->first();
      $topDishReviewRate = $topReview ? $this->getStarsAttribute($topReview['average']) : 'No reviews yet!' ;

      // number of branches
      $brancheCount = BranchBody::count();

      // number of total employees
      $employeeCount = (Chef::count()) + (Baristum::count()) + (Waiter::count());

      return view('admin.dashboard' , compact('userCount' , 'bookingCount' , 'reviews' , 'reviewAverage' , 'reviewCount' , 'disheCount' , 'tableCount' , 'galleryCount' , 'latestReview' , 'topDishReview' , 'brancheCount' , 'employeeCount' , 'topDishReviewRate'));
    }

    /*==================================
         Display dish rate in stars
    =====================================*/
    public function getStarsAttribute($attribute)
    {
      return [
        1 => '<ul class="list-inline mb-3">
            <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
            <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
            <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
            <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
            <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
          </ul>',
       2 => '<ul class="list-inline mb-3">
           <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
           <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
           <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
           <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
           <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
         </ul>',
        3 => '<ul class="list-inline mb-3">
            <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
            <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
            <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
            <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
            <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
          </ul>' ,
        4 => '<ul class="list-inline mb-3">
              <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
              <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
              <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
              <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
              <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
            </ul>' ,
          5 => '<ul class="list-inline mb-3">
                <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
              </ul>' ,
        ][$attribute];
    }

    /*==================================
         Top dish review function
    =====================================*/
    public function topDishReview()
    {
       $dishes = SlideMenu::select('id')->get();
       $stars = [] ;
       if (count($dishes) > 0) {
           foreach ($dishes as $dish) {
             $count = DishReview::where('dish_id' , $dish->id)->count() ;
             if ($count > 0) {
                 $average =(DishReview::where('dish_id' , $dish->id)->sum('dishStars')) / $count ;
                 $stars[] =['average' =>  $average ,'id' => $dish->id ];
             }else {
                 $stars[] = 0;
             }
           }
       }else {
         $stars[] = 0;
       }
       $topReview = max($stars);
       return $topReview ;
    }

    /*==================================
         Display chart for bookings
    =====================================*/
    public function chartBooking()
    {
        $dayOfTheWeek = [] ; $bookings = [] ;

        for ($i=0; $i <7 ; $i++) {
            $dayOfTheWeek[] = \Carbon\Carbon::now()->addDays($i)->format('D');
            $bookings_1[] = Booking::where('date' , \Carbon\Carbon::now()->addDays($i)->format('Y-m-d'))->count();
        }
        for ($i=7; $i <14 ; $i++) {
            $bookings_2[] = Booking::where('date' , \Carbon\Carbon::now()->addDays($i)->format('Y-m-d'))->count();
        }
        for ($i=14; $i <21 ; $i++) {
            $bookings_3[] = Booking::where('date' , \Carbon\Carbon::now()->addDays($i)->format('Y-m-d'))->count();
        }
        for ($i=21; $i <28 ; $i++) {
            $bookings_4[] = Booking::where('date' , \Carbon\Carbon::now()->addDays($i)->format('Y-m-d'))->count();
        }
        foreach ($bookings_1 as $key => $value) {
          $bookings[] = $bookings_1[$key] + $bookings_2[$key] + $bookings_3[$key] + $bookings_4[$key] ;
        }
        return response()->json([ 'dayOfTheWeek' => $dayOfTheWeek , 'bookings' => $bookings ]);
    }
    /*==================================
         Display chart for new vistors
    =====================================*/
    public function chartNewVistors()
    {
        $dayOfTheWeek = [] ; $newVistors = [] ;

        for ($i=0; $i <7 ; $i++) {
            $dayOfTheWeek[] = \Carbon\Carbon::now()->subDays($i)->format('D');
            $newVistors[] = Booking::where('date' , \Carbon\Carbon::now()->subDays($i)->format('Y-m-d'))->sum('peopleNumber');
        }
        return response()->json([ 'dayOfTheWeek' => $dayOfTheWeek , 'newVistors' => $newVistors ]);
    }
}
