<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{

  public function company()
  {

    return $this->belongsTo(Company::class);

  }

  public function company()
  {

    return $this->belongsTo(Company::class);

  }

  public function user()
  {

    return $this->belongsTo(User::class);

  }


    //
}
