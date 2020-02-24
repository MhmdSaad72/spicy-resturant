<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Availability extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'availabilities';

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
    protected $fillable = ['title', 'description', 'start_day', 'end_day' , 'start_time' , 'end_time'];


    public function getDayAttribute($attribute)
    {
        return
        [
          1 => 'Saturday',
          2 => 'Sunday',
          3 => 'Monday',
          4 => 'Tuesday',
          5 => 'Wednesday',
          6 => 'Thursday',
          7 => 'Friday',
        ][$attribute];
    }

}
