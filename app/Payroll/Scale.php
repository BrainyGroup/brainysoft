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

  public function payroll_group()
  {

    return $this->belongsTo(Payroll_group::class);

  }

  public function employment_type()
  {

    return $this->belongsTo(Employment_type::class);

  }

  public function employee()
  {

    return $this->hasMany(Employee::class);

  }

}
