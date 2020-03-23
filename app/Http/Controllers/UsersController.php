<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\BasicDetail;
use App\user;
use App\Review;
use App\NavBar ;
use App\SlideMenu ;
use App\MainDish ;
use Hash;
use Auth;
use DB;

class UsersController extends Controller
{

    /* ===============================================
        Display personal information page for user
    ================================================*/
    public function show($id)
    {
        $user = User::findOrFail($id);
        $basicDetail = BasicDetail::first();
        $bookings = $user->bookings->count();
        $navbar = NavBar::first();
        dd($user);
        $mainDish = MainDish::first();
        $newDishes = SlideMenu::latest()->take(3)->get();
        if (Auth::check() && Auth::user()->id == $id)
        {
          return view('pages.users.personal-information' , compact('user' , 'basicDetail' , 'bookings' , 'navbar' , 'mainDish' , 'newDishes'));
        }else {
          abort(403);
        }
    }

    /* =======================================
      Display edit information page for user
    ==========================================*/
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $basicDetail = BasicDetail::first();
        $navbar = NavBar::first();
        $mainDish = MainDish::first();
        $newDishes = SlideMenu::latest()->take(3)->get();
        $bookings = $user->bookings->count();
        if (Auth::check() && Auth::user()->id == $id)
        {
          return view('pages.users.edit' , compact('user' , 'basicDetail' , 'bookings' , 'newDishes' , 'mainDish' , 'navbar'));
        }else {
          abort(403);
        }
    }

    /* =======================================
          Update user information method
    ==========================================*/
    public function update(Request $request , $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request , [
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
          // 'country' => '',
          'phone' => 'required|max:255'
        ]);
        $requestData = $request->all();
        if (is_null($request->country)) {
            $requestData['country'] = $user->country;
        }
        $user->update($requestData);

        return redirect()->route('personal.information' , ['id' => $user->id])->with('message' , 'User updated Successfully!');
    }

    /* =======================================
      Display change password page for user
    ==========================================*/
    public function changePassword($id)
    {
        $user = User::findOrFail($id);
        $basicDetail = BasicDetail::first();
        $bookings = $user->bookings->count();
        $navbar = NavBar::first();
        $mainDish = MainDish::first();
        $newDishes = SlideMenu::latest()->take(3)->get();

        if (Auth::check() && Auth::user()->id == $id)
        {
          return view('pages.users.change-password' , compact('user' , 'basicDetail' , 'bookings' , 'navbar' , 'mainDish' , 'newDishes'));
        }else {
          abort(403);
        }
    }

    /* =======================================
          Display review page for user
    ==========================================*/
    public function review($id)
    {
        $user = User::findOrFail($id);
        $basicDetail = BasicDetail::first();
        $review =  Review::where('user_id' , $id)->first();
        $navbar = NavBar::first();
        $mainDish = MainDish::first();
        $newDishes = SlideMenu::latest()->take(3)->get();
        $bookings = $user->bookings->count();
        if (Auth::check() && Auth::user()->id == $id)
        {
          return view('pages.users.review' , compact('user' , 'review' , 'bookings' , 'basicDetail' , 'navbar' , 'mainDish' , 'newDishes'));
        }else {
          abort(403);
        }
    }

    /* =======================================
        Store website review method for user
    ==========================================*/
    public function storeReview(Request $request , $id)
    {
        // dd($request->all());
        $this->validate($request , [
            'stars' => 'required',
            'reviewTopic' => 'required',
            'reviewBody' => 'required',
        ]);

        $user = User::findOrFail($id);
        $requestData = $request->all();
        $requestData['user_id'] = $user->id ;

        $review =  Review::create($requestData);

        return redirect()->back();
    }

    /* =======================================
            Display review edit page
    ==========================================*/
    public function editReview($id)
    {
      $user = User::findOrFail($id);
      $basicDetail = BasicDetail::first();
      $review =  Review::where('user_id' , $id)->first();
      $navbar = NavBar::first();
      $mainDish = MainDish::first();
      $newDishes = SlideMenu::latest()->take(3)->get();
      $bookings = $user->bookings->count();
      if (Auth::check() && Auth::user()->id == $id)
      {
        return view('pages.users.edit-review' , compact('user' , 'review' , 'bookings' , 'basicDetail' , 'navbar' , 'newDishes' , 'mainDish'));
      }else {
        abort(403);
      }
    }

    /* =======================================
        Update website review method for user
    ==========================================*/
    public function updateReview(Request $request , $id)
    {
      $this->validate($request , [
          'stars' => 'required',
          'reviewTopic' => 'required',
          'reviewBody' => 'required',
      ]);
      $user = User::findOrFail($id);
      $requestData = $request->all();
      $requestData['user_id'] = $user->id ;

      $review =  Review::where('user_id' , $user->id)->firstOrFail();
      $review->update($requestData);

      return redirect()->route('personal.review' , ['id' =>$user->id]);
    }

    /* =======================================
        Update password method for user
    ==========================================*/
    public function updatePassword(Request $request , $id)
    {
      $this->validate($request , [
        'oldPass' => ['required', 'string', 'min:8', 'max:255'] ,
        'password' => ['required', 'string', 'min:8', 'confirmed' ,'max:255'] ,
      ]);

      $user = User::findOrFail($id);
      // $oldPass = Hash::make($request->oldPass) ;
      if (Hash::check($request->oldPass, $user->password)) {
        $user->update([
          'password' => Hash::make($request->password) ,
        ]) ;
        return redirect()->route('personal-information' , ['id' => $user->id]);
      }else {
        return redirect()->back()->with('error' , 'Your old password is not correct');
      }
    }

    /* =======================================
        Display all users in admin panel
    ==========================================*/
    public function clients(Request $request)
    {
      $keyword = $request->get('search');
      $perPage = 20;

      if (!empty($keyword)) {
          $clients = User::where('name', 'LIKE', "%$keyword%")
              ->orWhere('email', 'LIKE', "%$keyword%")
              ->orWhere('phone', 'LIKE', "%$keyword%")
              ->orWhere('country' , 'LIKE' , "%$keyword%")
              ->latest()->paginate($perPage);
      } else {
          $clients = User::latest()->paginate($perPage);
      }

      return view('admin.clients.client' , compact('clients'));
    }


}
