<?php

namespace BrainySoft\Payroll;

use Illuminate\Database\Eloquent\Model;

class Deduction_type extends Model
{
  public function deduction()
  {

    return $this->hasMany(Deduction::class);

  }

}
