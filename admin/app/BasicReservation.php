<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasicReservation extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'tables';

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
  protected $fillable = ['tables', 'chairs'];


  public function maxPeople()
  {
    $maxNumber = ($this->chairs) * ($this->tables);
    return $maxNumber;
  }
}
