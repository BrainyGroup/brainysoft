<?php

namespace BrainySoft\Payroll;

use Illuminate\Database\Eloquent\Model;

class Employment_type extends Model
{
    public function scales()
     {

       return $this->hasMany(Scale::class);

     }

}
