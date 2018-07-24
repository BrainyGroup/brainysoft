<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allowance_type extends Model
{

  public function allowances()
  {

    return $this->hasMany(Allowance::class);

  }

}
