<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

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
    protected $fillable = ['name' , 'title' , 'description'];


    public function slide_menus()
    {
      return $this->hasMany('App\SlideMenu');
    }

    public function dishes()
    {
      $dishes = SlideMenu::where('category_id' , $this->id)->latest()->take(6)->get();
      return $dishes ;
    }


}
