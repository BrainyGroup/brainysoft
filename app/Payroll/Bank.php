<?php

namespace BrainySoft\Payroll;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{

  protected $fillable = ['name', 'description','company_id','country_id'];
  

  public  function employees()
  {

      return $this->hasMany(Employee::class);

   }


   public  function organizations()
   {

       return $this->hasMany(Organization::class);

    }

   



}
