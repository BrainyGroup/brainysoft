<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'name', 'email', 'password', 'firstname', 'middlename',
        'lastname', 'dod', 'mobile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function companies()
    {

      return $this->hasMany(Company::class);

    }

    public function pays()
    {

      return $this->hasMany(Pay::class);

    }

    public function employee()
    {

      return $this->hasOne(Employee::class);

    }


    public function country()
    {

      return $this->belongsTo(Country::class);

    }





}
