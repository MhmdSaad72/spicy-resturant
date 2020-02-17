<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureDishBody extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'feature_dish_bodies';

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
    protected $fillable = ['title', 'image', 'content', 'price', 'old_price'];


}
