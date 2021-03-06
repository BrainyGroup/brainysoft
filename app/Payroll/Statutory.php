<?php

namespace BrainySoft\Payroll;

use Illuminate\Database\Eloquent\Model;

class Statutory extends Model
{

  public function company()
  {

    return $this->belongsTo(Company::class);

  }

  public function employee()
  {

    return $this->belongsToMany(Employee::class);

  }

  public  function statutory_type()
  {

      return $this->belongsTo(Statutory_type::class);

   }

   public  function salary_base()
   {

       return $this->belongsTo(Salary_base::class);

    }

    public  function organization()
    {

        return $this->belongsTo(Organization::class);

     }

     public  function pay_statutories()
    {

        //return $this->belongsMany(Pay_statutory::class);
         //return $this->hasMany(Pay_statutory::class);
         return $this->belongsTo(Pay_statutory::class);

     }

}
