<?php

namespace BrainySoft\Payroll;

use Illuminate\Database\Eloquent\Model;

class Kin_type extends Model
{

  public function kins()
   {

       return $this->hasMany(Kin::class);

   }
}
