<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        //

        DB::table('users')->insert([[
            'name'=>'Alvin',
            'email'=>'otuyaalvin@gmail.com',
            'password'=>Hash::make('Alvino2ya'),
        ],[
            'name'=>'Samuel',
            'email'=>'samuel@gmail.com',
            'password'=>Hash::make('samuel'),
        ]]);
    }
}
