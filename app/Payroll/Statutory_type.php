<?php

namespace BrainySoft;

use Illuminate\Database\Eloquent\Model;

class Statutory_type extends Model
{

  public function company()
  {

    return $this->belongsTo(Company::class);

  }

  public function Statutories()
  {

      return $this->hasMany(Statutory::class);

  }

}
