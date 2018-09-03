<?php

namespace BrainySoft;

use Illuminate\Database\Eloquent\Model;

class Scale extends Model
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
