<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
      'designation', 'identity', 'startdate', 'enddate',
    ];


    public function salary()
	   {

		     return $this->hasOne(Salary::class);

	   }


     public function allowances()
 	   {

 		     return $this->hasMany(Allowance::class);

 	   }

     public function pays()
     {

       return $this->hasMany(Pay::class);

     }

     public function center()
     {

       return $this->belongsTo(Center::class);

     }

     public function company()
     {

       return $this->belongsTo(Company::class);

     }

     public function scale()
     {

       return $this->belongsTo(Scale::class);

     }


     public function user()
     {

       return $this->belongsTo(User::class);

     }


     public function deductions()
 	   {

 		     return $this->hasMany(Deduction::class);

 	   }
}
