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
                "introduction" => "Haliiiii bela vagyok",
                "country"=> "Magyarország",
                "postal_code"=>1185,
                "city"=>"Budapest",
                "address"=>"Kis utca 54.",
                "profile_pic"=>"asd.jpg",
                "profession"=>"szerelő",
                "user_id"=> 3
            ],
            [
                "introduction" => "Haliiiii bela vagyok",
                "country"=> "Magyarország",
                "postal_code"=>1185,
                "city"=>"Budapest",
                "address"=>"Kis utca 54.",
                "profile_pic"=>"asd.jpg",
                "profession"=>"szerelő",
                "user_id"=> 5
            ],
            [
                "introduction" => "Haliiiii bela vagyok",
                "country"=> "Magyarország",
                "postal_code"=>1185,
                "city"=>"Budapest",
                "address"=>"Kis utca 54.",
                "profile_pic"=>"asd.jpg",
                "profession"=>"szerelő",
                "user_id"=> 6
            ],
        ]);
    }
}
