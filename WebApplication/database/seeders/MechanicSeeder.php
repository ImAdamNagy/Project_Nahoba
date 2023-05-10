<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MechanicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mechanic')->insert([
            [
                "introduction" => "Ádám vagyok",
                "country"=> "Magyarország",
                "postal_code"=>1183,
                "city"=>"Budapest",
                "address"=>"Kis utca 54.",
                "profile_pic"=>"adam.jpg",
                "profession"=>"car mechanic",
                "user_id"=> 4
            ],
            [
                "introduction" => "Kiki vagyok",
                "country"=> "Magyarország",
                "postal_code"=>1185,
                "city"=>"Budapest",
                "address"=>"Kis utca 54.",
                "profile_pic"=>"kiki.jpg",
                "profession"=>"car locksmith",
                "user_id"=> 2
            ],
            [
                "introduction" => "Bandi vagyok",
                "country"=> "Magyarország",
                "postal_code"=>1186,
                "city"=>"Budapest",
                "address"=>"Kis utca 54.",
                "profile_pic"=>"bandi.jpg",
                "profession"=>"engine professor",
                "user_id"=> 7
            ],
        ]);
    }
}
