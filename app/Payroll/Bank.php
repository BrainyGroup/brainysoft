<?php

namespace BrainySoft;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
  public  function employees()
  {

      return $this->hasMany(Employee::class);

   }


   public  function organizations()
   {

       return $this->hasMany(Organization::class);

    }

   



}
