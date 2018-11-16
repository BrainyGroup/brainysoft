<?php

namespace BrainySoft;

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

     public function statutories()
 	   {

 		     return $this->belongsToMany(Statutory::class)

         ->withPivot('company_id','employee_statutories')

    	   ->withTimestamps();

 	   }


     public function kins()
      {

          return $this->hasMany(Kin::class);

      }

     public function level()
     {

       return $this->belongsTo(Level::class);

     }

     public function department()
     {

       return $this->belongsTo(Department::class);

     }

     public function getAge() 
     {
      return $this->user->dob->diffInYears(\Carbon::now());
     }
}