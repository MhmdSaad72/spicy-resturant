<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\BasicDetail;
use App\user;
use Auth;

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
        'password' => ['required', 'string', 'min:8', 'confirmed' , 'max:255'],
        'country' => 'required|max:255',
        'phone' => 'required|max:255'
      ]);
      $requestData = $request->all();
      $user->update($requestData);

      return redirect()->rout('personal.information' , ['id' => $user->id])->with('message' , 'User updated Successfully!');
    }

    public function changePassword($id)
    {
      $user = User::findOrFail($id);
      $basicDetail = BasicDetail::first();
      $bookings = $user->bookings->count();
      return view('pages.users.change-password' , compact('user' , 'basicDetail' , 'bookings'));
    }
}
