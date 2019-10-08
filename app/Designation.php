<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    //
    protected $fillable = ['name'];

    public function officials()
    {
        return $this->hasMany(Official::class);
    }

    public function ministers()
    {
        return $this->hasMany(Minister::class);
    }
}
