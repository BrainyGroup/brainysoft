<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
      'amount',
    ];


    public  function employee()
    {

		    return $this->belongsTo(Employee::class);

	   }

     public  function scale()
     {

 		    return $this->belongsTo(Scale::class);

 	   }

     public  function center()
     {

 		    return $this->belongsTo(Center::class);

 	   }

     public  function company()
     {

         return $this->belongsTo(Company::class);

      }
}
