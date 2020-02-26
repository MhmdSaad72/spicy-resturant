<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bookings';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fullname' , 'email' , 'phone' , 'smokingArea' , 'peopleNumber' , 'tablesNumber' , 'date' , 'time' , 'specialrequest' , 'booking_id' , 'cancelled'];


    public function getSmokingAreaAttribute($attribute)
    {
      return [
        0 => 'Smoking area',
        1 => 'Non-smoking area',
      ][$attribute];
    }


}
