<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    //
    protected $fillable = ['name', 'constituency_id', 'state_id'];

    public function constituency()
    {
        return $this->belongsTo(Constituency::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }

    public function officials()
    {
        return $this->hasMany(Official::class);
    }

}
