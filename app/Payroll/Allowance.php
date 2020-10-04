<?php

namespace BrainySoft\Payroll;

use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{

  public  function employee()
  {

      return $this->belongsTo(Employee::class);

   }

   public  function allowance_type()
   {

       return $this->belongsTo(Allowance_type::class);

    }

  

}
