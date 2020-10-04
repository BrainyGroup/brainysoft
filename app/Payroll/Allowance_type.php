<?php

namespace BrainySoft\Payroll;

use Illuminate\Database\Eloquent\Model;

class Allowance_type extends Model
{


  protected $fillable = ['company_id','name','description'];

  public function allowances()
  {

    return $this->hasMany(Allowance::class);

  }

}
