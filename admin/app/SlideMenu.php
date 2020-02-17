<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SlideMenu extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'slide_menus';

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

    public function menu_lists()
    {
      return $this->hasMany('App\MenuList');
    }

    public function category()
    {
      return $this->belongsTo('App\Category' , 'category_id');
    }

    public function tag()
    {
      return $this->belongsTo('App\Tag' , 'tag_id');
    }

    public function str_limit($content)
    {
      $truncated = Str::limit($content, 40, '...');
      return $truncated ;
    }


}
