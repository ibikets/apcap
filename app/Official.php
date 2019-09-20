<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    //
    protected $fillable = ['name', 'mobile', 'phone', 'profile', 'photo', 'constituency_id', 'ward_id', 'lga_id', 'state_id', 'position_id', 'party_id','party_card_no', 'district_id'];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
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

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }
}
