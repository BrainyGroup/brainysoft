<?php

namespace BrainySoft;

use Illuminate\Database\Eloquent\Model;

class Pay_statutory extends Model
{
    public function pay()
    {

      return $this->belongsTo(Pay::class);

    }

    public function statutories()
    {

      //return $this->belongsTo(Statutory::class);
      //return $this->hasMany(Statutory::class);
      return $this->hasMany(Statutory::class);

    }

   

}
