<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
      'amount',
    ];

    public  function employee()
    {
		    return $this->belongsTo('App\Employee');
	   }
}
