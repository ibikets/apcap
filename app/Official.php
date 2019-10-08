<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    //
    protected $fillable =['name', 'dob', 'designation_id', 'constituency_id', 'state_id', 'district_id', 'lga_id', 'ward_id','party_id', 'party_card_no'];

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function party()
    {
        return $this->belongsTo(Party::class);
    }

    public function constituency()
    {
        return $this->belongsTo(Constituency::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }

}
