<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ["name" => "Abdullahi Jafar Musa", "email" => "mrjafprogrammer@gmail.com", "role" => "Senior Developer", "password" => Hash::make("password")]
        ]);
    }
}
