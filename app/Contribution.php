<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    protected $fillable = [
      'name', 'description', 'employee', 'employer', 'total', 'date_required', 'type'
    ];
}
