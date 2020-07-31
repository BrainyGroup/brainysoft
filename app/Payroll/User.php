<?php

namespace BrainySoft;

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
        'lastname', 'dod', 'mobile','country_id','company_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function company()
    {

      return $this->belongsTo(Company::class);

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

    public function getFullName()
    {
      return $this->title . ' ' . $this->firstname . ' ' . $this->lastname;
    }

    public function getFirstnameOrUsername()
    {
      if(!$this->firstname){
        return $this->username;
      }

      return $this->firstname;
    }

    public static function isMarried()
    {
      return static::where('maritalstatus', 1)->get();

      //uses
      //$user = $user->isMarried()->get();

    }

    public function scopeNotMarried($query)
    {
      return $query->where('maritalstatus', 0);
    }

    
    public function getAgeAttribute()
    {
    return Carbon::parse($this->attributes['dob'])->age;
    }

    public function age() {
    return $this->dob->diffInYears(\Carbon::now());
    }

    public function scaopeNotEmployee($id){
      return static::where('company_id',$id)
      ->where('employee',false)
      ->get(); 
    }





}
