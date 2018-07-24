<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{

  public function salaries()
  {

    return $this->hasMany(Salary::class);

  }

  public function company()
  {

    return $this->belongsTo(Company::class);

  }

  public function employee()
  {

    return $this->hasMany(Employee::class);

  }

}
