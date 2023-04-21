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
                "username" => "admin",
                "password" => Hash::make('admin123'),
                "role_id" => 1,
            ],
            [
                "firstname" => "Pista",
                "lastname" => "Kovács",
                "email" => "admin@adminn.com",
                "tel" => "06304558183",
                "username" => "adminn",
                "password" => Hash::make('admin123'),
                "role_id" => 1,
            ]
        ]);
    }
}
