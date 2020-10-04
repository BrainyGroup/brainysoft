<?php

namespace BrainySoft\Payroll;

use Illuminate\Database\Eloquent\Model;

class Paye extends Model
{

    public function country()
    {

      return $this->belongsTo(Country::class);

    }
}
