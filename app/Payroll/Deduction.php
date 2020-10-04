<?php

namespace BrainySoft\Payroll;

use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    //

    public  function employee()
    {

        return $this->belongsTo(Employee::class);

     }

     public  function deduction_type()
     {

         return $this->belongsTo(Deduction_type::class);

      }
}
