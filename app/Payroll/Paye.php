<?php

namespace BrainySoft;

use Illuminate\Database\Eloquent\Model;

class Paye extends Model
{

    public function country()
    {

      return $this->belongsTo(Country::class);

    }
}
