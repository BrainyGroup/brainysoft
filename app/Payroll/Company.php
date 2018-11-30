<?php

namespace BrainySoft;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
      'name', 'description', 'country_id','usage_count','last_renew_date','trial_expire_date',
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

    public function salaries()
    {

      return $this->hasMany(Salary::class);

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

    public function employees()
    {

      return $this->hasMany(Employee::class);

    }
}
