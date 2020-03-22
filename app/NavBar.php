<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NavBar extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nav_bars';

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
    protected $fillable = ['home', 'about', 'about_1', 'about_2', 'contact', 'contact_1', 'contact_2', 'menu', 'menu_1', 'menu_2', 'pages'];

    
}
