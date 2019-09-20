<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Ibinabo Iketubosin',
            'email' => 'ibikets@gmail.com',
            'password' => Hash::make('admin1234'),
            'role_id' => 1
        ]);
    }
}
