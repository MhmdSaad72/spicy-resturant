<?php

use Illuminate\Foundation\Inspiring;
use App\Booking;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('clean:bookings' , function(){
  $this->info('Cleaning!');
  $date = \Carbon\Carbon::now();
  Booking::where('date' , '<' , $date)
           ->get()
           ->each(function($booking){
             $booking->delete();
             $this->warn('Deleted: ' . $booking->booking_id);
           });
})->describe('Clean expired bookings');
