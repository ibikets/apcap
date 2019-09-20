<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    //
    protected $fillable = ['name', 'constituency_id', 'state_id'];

    public function constituency()
    {
        $this->belongsTo(Constituency::class);
    }

    public function state()
    {
        $this->belongsTo(State::class);
    }

    public function wards()
    {
        $this->hasMany(Ward::class);
    }

}
