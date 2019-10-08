<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minister extends Model
{
    //
    protected $fillable =['name', 'dob','photo', 'designation_id', 'party_id', 'party_card_no'];

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function party()
    {
        return $this->belongsTo(Party::class);
    }

}
