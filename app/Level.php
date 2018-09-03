<?php

namespace BrainySoft;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

  public function employees()
  {

    return $this->hasMany(Employee::class);

  }
}
