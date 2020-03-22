<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $primaryKey = 'id';

    protected $fillable = ['stars', 'reviewTopic', 'reviewBody' , 'user_id' ];


    public function user()
    {
      return $this->belongsTo('App\User' , 'user_id');
    }


    public function getReviewTopicAttribute($attribute)
    {
      return [
          1 => 'Atmosphere',
          2 => 'Dishes Qulaity',
          3 => 'Order responsiveness',
      ][$attribute];
    }

    public function getStarsAttribute($attribute)
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
