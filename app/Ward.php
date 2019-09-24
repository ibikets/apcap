<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    //
    protected $fillable = ['name', 'lga_id', ''];

    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }
}
