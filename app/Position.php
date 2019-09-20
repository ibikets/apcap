<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    protected $fillable =['name'];

    public function officials()
    {
        return $this->hasMany(Official::class);
    }
}
