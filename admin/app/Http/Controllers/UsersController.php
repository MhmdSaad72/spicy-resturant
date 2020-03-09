<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\BasicDetail;
use App\user;
use App\Review;
use Auth;
use DB;

class UsersController extends Controller
{
    public function show($id)
    {

      $user = User::findOrFail($id);
      $basicDetail = BasicDetail::first();
      $bookings = $user->bookings->count();
      return view('pages.users.personal-information' , compact('user' , 'basicDetail' , 'bookings'));
    }


    public function edit($id)
    {
      $user = User::findOrFail($id);
      $basicDetail = BasicDetail::first();
      $bookings = $user->bookings->count();
      return view('pages.users.edit' , compact('user' , 'basicDetail' , 'bookings'));
    }

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

    public function changePassword($id)
    {
      $user = User::findOrFail($id);
      $basicDetail = BasicDetail::first();
      $bookings = $user->bookings->count();
      return view('pages.users.change-password' , compact('user' , 'basicDetail' , 'bookings'));
    }


    public function review($id)
    {
        $user = User::findOrFail($id);
        $basicDetail = BasicDetail::first();
        $review =  Review::where('user_id' , $id)->first();
        return view('pages.users.review' , compact('user' , 'review'));
    }

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

    public function editReview($id)
    {
      $user = User::findOrFail($id);
      $basicDetail = BasicDetail::first();
      $review =  Review::where('user_id' , $id)->first();
      return view('pages.users.edit-review' , compact('user' , 'review'));
    }

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
}
