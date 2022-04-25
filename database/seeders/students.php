<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class students extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'studentname' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'phone' => Str::random(10),
            'address' => Str::random(10),
            'gender' => Str::random(10),
            'program' => Str::random(10),
            'password' => Hash::make('password'),
            'flink' => Str::random(10),
            'instalink' => Str::random(10),
            'parentemail' => Str::random(s10),
            'parentphone' => '08132911690'
        ]);
    }
}
