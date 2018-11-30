<?php

namespace BrainySoft;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
   public function employees()
     {

       return $this->hasMany(Employee::class);

     }

     public function scale()
     {

       return $this->belongsTo(Scale::class);

     }

     public function level()
     {

       return $this->belongsTo(Level::class);

     }
}
