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
}
