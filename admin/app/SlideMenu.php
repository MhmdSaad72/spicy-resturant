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

    public function average()
    {
      $count = DishReview::where('dish_id' , $this->id)->count();
      $stars = DishReview::where('dish_id' , $this->id)->sum('dishStars');
      if ($count > 0) {
        $average = $stars / $count ;
        $rate = intval($average);
        $rateStars = $this->getDishStarsAttribute($rate) ;
      }else {
        $rateStars = '<p class="text-primary">This dish has no review yet</p>';
      }
      return $rateStars;
    }

    public function afterDiscount()
    {
      $realDiscount = (100 - $this->discount)/100 ;
      $price = $realDiscount * $this->price ;
      return $price ;
    }

    public function getDishStarsAttribute($attribute)
    {
      return [
        1 => '<ul class="list-inline mb-3">
            <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
            <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
            <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
            <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
            <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
          </ul>',
       2 => '<ul class="list-inline mb-3">
           <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
           <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
           <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
           <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
           <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
         </ul>',
        3 => '<ul class="list-inline mb-3">
            <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
            <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
            <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
            <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
            <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
          </ul>' ,
        4 => '<ul class="list-inline mb-3">
              <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
              <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
              <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
              <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
              <li class="list-inline-item small m-0"><i class="fas fa-star text-muted small"></i></li>
            </ul>' ,
          5 => '<ul class="list-inline mb-3">
                <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
                <li class="list-inline-item small m-0"><i class="fas fa-star text-primary small"></i></li>
              </ul>' ,
        ][$attribute];
    }


}
