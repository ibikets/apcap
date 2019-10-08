<?php

use App\Constituency;
use App\District;
use App\Lga;
use App\Minister;
use App\Official;
use App\Party;
use App\Designation;
use App\State;
use App\Ward;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OfficialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Official::create([
            'name' => 'Adeleke Mamora',
            'dob' => Carbon::createFromDate('1982','05','31'),
            'designation_id' => 1,
            'constituency_id'=>1,
            'state_id'=>1,
            'district_id'=>1,
            'lga_id'=>1,
            'ward_id'=>1,
            'party_id'=>1,
            'party_card_no'=>'APC/ABJ/01928002'
        ]);

        Minister::create([
            'name' => 'Hassana Ameh',
            'dob' => Carbon::createFromDate('1978','06','21'),
            'designation_id' => 1,
            'party_id'=>1,
            'party_card_no'=>'APC/ABJ/01928002'
        ]);

        Designation::create([
           'name'=>'FCT Minister'
        ]);

        Designation::create([
            'name'=>'Senator'
        ]);

        State::create([
            'name'=>'Federal Capital Territory',
            'abbrv'=>'FCT'
        ]);

        District::create([
            'name'=>'Federal Senatorial District',
            'state_id'=>1
        ]);

        Constituency::create([
            'name'=>'AMAC/BWARI',
            'district_id'=>1
        ]);

        Lga::create([
            'name'=>'AMAC',
            'constituency_id'=>1,

        ]);

        Ward::create([
            'name'=>'Ward 1',
            'lga_id'=>1
        ]);

        Party::create([
           'name'=>'All Progressive Congress',
            'abbrv'=>'APC'
        ]);

        Party::create([
            'name'=>'Peoples Democratic Party',
            'abbrv'=>'PDP'
        ]);
    }
}
