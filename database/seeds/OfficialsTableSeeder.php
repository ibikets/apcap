<?php

use App\Constituency;
use App\District;
use App\Lga;
use App\Official;
use App\Party;
use App\Position;
use App\State;
use App\Ward;
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
            'phone' => 8037245117,
            'mobile' => 8085580984,
            'profile' => 'This is the profile of the honorable minister of state.............',
            'position_id' => 1,
            'constituency_id'=>1,
            'state_id'=>1,
            'district_id'=>1,
            'lga_id'=>1,
            'ward_id'=>1,
            'party_id'=>1,
            'party_card_no'=>'APC/ABJ/01928002'
        ]);

        Position::create([
           'name'=>'Governor'
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
