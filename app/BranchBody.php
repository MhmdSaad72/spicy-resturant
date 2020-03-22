<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchBody extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'branch_bodies';

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
    protected $fillable = ['place', 'address', 'phone', 'email','map_directions'];


}
