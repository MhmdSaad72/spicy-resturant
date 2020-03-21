<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainDish extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'main_dishes';

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
    protected $fillable = ['dish_id'];

    public function dish()
    {
      return $this->belongsTo('App\SlideMenu' , 'dish_id');
    }


}
