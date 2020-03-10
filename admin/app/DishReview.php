<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishReview extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'dish_review';

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


  public function user()
  {
    return $this->belongsTo('App\User' , 'user_id');
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
