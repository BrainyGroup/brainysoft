<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
      'name', 'description', 'logo',
    ];

    public function country()
    {

      return $this->belongsTo(Country::class);

    }

    public function center()
    {

      return $this->belongsTo(Center::class);

    }

    public function statutories()
    {

      return $this->hasMany(Statutory::class);

    }

    public function pays()
    {

      return $this->hasMany(Pay::class);

    }

    public function statutory_types()
    {

      return $this->hasMany(Statutory_type::class);

    }

    public function users()
    {

      return $this->hasMany(User::class);

    }

    public function organizations()
    {

      return $this->hasMany(Organizations::class);

    }

    public function employee()
    {

      return $this->hasMany(Employee::class);

    }
}
