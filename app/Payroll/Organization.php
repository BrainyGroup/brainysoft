<?php

namespace BrainySoft;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{

  public function statutory_types()
  {

      return $this->hasMany(Statutory_type::class);

  }

  public function company()
  {

      return $this->belongsTo(Company::class);

  }


  public function bank()
  {

      return $this->belongsTo(Bank::class);

  }

}
