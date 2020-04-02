<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AboutService extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'about_services';

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
    protected $fillable = ['title', 'content', 'icon', 'image'];

    public function str_limit()
    {
      $truncated = Str::limit($this->content, 40, '...');
      return $truncated ;
    }


}
