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
		     return $this->hasOne('App\Salary');
	   }
}
