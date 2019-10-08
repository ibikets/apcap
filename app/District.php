<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $fillable = ['name', 'state_id'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function constituencies()
    {
        return $this->hasMany(Constituency::class);
    }

}
