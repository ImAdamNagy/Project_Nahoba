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
                "firstname" => "Krisztián",
                "lastname" => "Holló",
                "email" => "hollokg@gmail.com",
                "tel" => "06706422096",
                "username" => "KriszRaven",
                "password" => Hash::make('Hollo02'),
                "role_id" => 2,
            ],
            [
                "firstname" => "Béla",
                "lastname" => "Kis",
                "email" => "kisbela@gmail.com",
                "tel" => "06809871213",
                "username" => "KisBela",
                "password" => Hash::make('KisBela00'),
                "role_id" => 3,
            ],
            [
                "firstname" => "Adam",
                "lastname" => "Nagy",
                "email" => "adamattila@gmail.com",
                "tel" => "06809871213",
                "username" => "adamnagy",
                "password" => Hash::make('Asdasd1'),
                "role_id" => 2,
            ],
            [
                "firstname" => "Pista",
                "lastname" => "Kis",
                "email" => "kispista@gmail.com",
                "tel" => "06809871213",
                "username" => "kispista",
                "password" => Hash::make('KisPista02'),
                "role_id" => 3,
            ],
            [
                "firstname" => "Bela",
                "lastname" => "Nagy",
                "email" => "belanagy@gmail.com",
                "tel" => "06809871213",
                "username" => "belanagy",
                "password" => Hash::make('BelaNagy02'),
                "role_id" => 3,
            ],
            [
                "firstname" => "András",
                "lastname" => "Bátori",
                "email" => "batori.andras@gmail.com",
                "tel" => "06706422096",
                "username" => "bandesz",
                "password" => Hash::make('bani123'),
                "role_id" => 2,
            ],
            [
                "firstname" => "Seller",
                "lastname" => "Mihály",
                "email" => "SellerMisi4@gmail.com",
                "tel" => "06706892096",
                "username" => "SellerMisi4",
                "password" => Hash::make('SellerMisi4'),
                "role_id" => 2,
            ],
        ]);
    }
}
