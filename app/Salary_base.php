<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary_base extends Model
{
    protected $fillable = ['name','description'];


    public function statutories()
    {

        return $this->hasMany(Statutory::class);

    }
}
