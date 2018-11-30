<?php

namespace BrainySoft;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{

  public function company()
  {

    return $this->belongsTo(Company::class);

  } 


  public function scopePosted($query)
    {
      return $query->where('posted', 1);
    }

  public function scopeUnposted($query)
    {
      return $query->where('posted', 0);
    }

    public function employee()
  {

    return $this->belongsTo(Employee::class);

  }


   public function pay_statutories()
    {

      return $this->hasMany(Pay_statutory::class);

    }

    public function pay_statutory()
    {

      return $this->where($pay_statutories->statutory->statutory_types->name,'SSF');

    }



  


    //
}
