<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menu_lists';

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
    protected $guarded = [];


    public function slideMenu()
    {
      return $this->belongsTo('App\SlideMenu' , 'slide_id');
    }


}
