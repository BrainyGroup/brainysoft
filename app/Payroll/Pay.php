<?php

namespace BrainySoft;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{

  public function company()
  {

    return $this->belongsTo(Company::class);

  }


  public function user()
  {

    return $this->belongsTo(User::class);

  }


  public function scopePosted($query)
    {
      return $query->where('posted', 1);
    }

  public function scopeUnposted($query)
    {
      return $query->where('posted', 0);
    }



    //
}
