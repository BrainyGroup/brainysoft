<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    protected $fillable = [
      'name', 'description', 'employee', 'employer', 'total', 'date_required', 'type'
    ];

    public  function employee()
    {

        return $this->belongsTo(Employee::class);

     }

     public  function contribution_type()
     {

         return $this->belongsTo(Contrybution_type::class);

      }

}
