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
                "firstname" => "Holló",
                "lastname" => "Krisztián",
                "email" => "hollokg@gmail.com",
                "tel" => "06706422096",
                "username" => "KriszRaven",
                "password" => Hash::make('Hollo02'),
                "role_id" => 2,
            ],
            [
                "firstname" => "Kis",
                "lastname" => "Béla",
                "email" => "kisbela@gmail.com",
                "tel" => "06809871213",
                "username" => "KisBela",
                "password" => Hash::make('KisBela00'),
                "role_id" => 3,
            ],
            
        ]);
    }
}
