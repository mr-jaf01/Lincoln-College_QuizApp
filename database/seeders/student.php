<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class student extends Seeder
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
            'parentemail' => Str::random(10),
            'parentphone' => '08132911690'
        ]);
    }
}
