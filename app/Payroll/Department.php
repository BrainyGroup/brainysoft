<?php

namespace BrainySoft;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  public function employees()
  {

    return $this->hasMany(Employee::class);

  }
}
