<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                "firstname" => "Pista",
                "lastname" => "Kovács",
                "email" => "admin@admin.com",
                "tel" => "06304558183",
                "postalcode" => "2241",
                "city" => "mucsaröcsöge",
                "address" => "csík utca 4.",
                "username" => "admin",
                "password" => Hash::make('admin123')
            ]
        ]);
    }
}
