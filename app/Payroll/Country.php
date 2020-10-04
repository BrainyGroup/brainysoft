<?php

namespace BrainySoft\Payroll;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name'];


    public function companies()
    {

      return $this->hasMany(Company::class);

    }

    public function paye()
    {

      return $this->hasMany(Paye::class);

    }

    public function users()
    {

      return $this->hasMany(User::class);

    }


    public function employees()
    {

      return $this->hasMany(Employee::class);

    }
}
