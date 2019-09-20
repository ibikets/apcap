<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    protected $fillable = ['name', 'abbrv'];

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function officials()
    {
        return $this->hasMany(Official::class);
    }
}
