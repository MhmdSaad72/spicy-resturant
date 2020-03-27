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
      $userCount = User::whereHas('roles', function($query) {
            $query->where('name', 'user');
        })->count();
      $now = \Carbon\Carbon::now();
      $bookingCount = Booking::where('date' , '>=' , $now)->count();

      $reviewCount = Review::count();
      $stars = Review::sum('stars');
      $reviewAverage = intval($stars / $reviewCount) ;
      $reviews =  $this->getStarsAttribute($reviewAverage) ;
      $disheCount = SlideMenu::count();
      $tables = BasicReservation::first();
      $tableCount = $tables->tables ;

      $galleryCount = Album::count();
      $latestReview =  Review::latest()->first();
      $topReview = $this->topDishReview();
      $topDishReview =SlideMenu::where('id' , $topReview['id'])->first();
      $topDishReview->rate = $this->getStarsAttribute($topReview['average']) ;

      $brancheCount = BranchBody::count();

$this->chartBooking();


      return view('admin.dashboard' , compact('userCount' , 'bookingCount' , 'reviews' , 'reviewAverage' , 'reviewCount' , 'disheCount' , 'tableCount' , 'galleryCount' , 'latestReview' , 'topDishReview' , 'brancheCount'));
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
       foreach ($dishes as $dish) {
         $count = DishReview::where('dish_id' , $dish->id)->count() ;
         if ($count > 0) {
           $average =(DishReview::where('dish_id' , $dish->id)->sum('dishStars')) / $count ;
           $stars[] =['average' =>  $average ,'id' => $dish->id ];
         }
       }
       $topReview = max($stars);
       return $topReview ;
    }

    /*==================================
         Display chart for bookings
    =====================================*/
    public function chartBooking()
    {
      $dayOfTheWeek = [] ;
      $bookings = [] ;
      for ($i=0; $i <7 ; $i++) {
        $dayOfTheWeek[] = \Carbon\Carbon::now()->addDays($i)->format('D');
        $bookings[] = Booking::where('date' , \Carbon\Carbon::now()->addDays($i)->format('Y-m-d'))->count();
      }
      return response()->json([
        'dayOfTheWeek' => $dayOfTheWeek ,
        'bookings' => $bookings ,
      ], 200);

    }
}
