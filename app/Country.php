<?php

namespace App;

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


    public function country()
    {

      return $this->belongsTo(Country::class);

    }
}
