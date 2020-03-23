<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\MailResetPasswordToken;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable , HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country' , 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
      $this->notify(new MailResetPasswordToken($token));
    }

    public function bookings()
    {
      return $this->hasMany('App\Booking' , 'user_id');
    }

    public function review()
    {
      return $this->hasOne('App\Review' , 'user_id');
    }

    public function dishReview()
    {
      return $this->hasOne('App\DishReview' , 'user_id');
    }

    public function userBookings()
    {
      $date = \Carbon\Carbon::now();
      $bookings = Booking::where('date' , '>=' , $date)->where('user_id' , $this->id)->get();
      return $bookings;
    }


}
