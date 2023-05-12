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
                "introduction" => "Hey Im Adam and i have been working in the mechanic industry for eleven years now. If you have any problems with your car just leave me a message.",
                "country"=> "Magyarország",
                "postal_code"=>1183,
                "city"=>"Budapest",
                "address"=>"Zsolt street 54.",
                "profile_pic"=>"adam.jpg",
                "profession"=>"car mechanic",
                "user_id"=> 4
            ],
            [
                "introduction" => "Hello I am Krisztián aka Kiki. And I am a car body locksmith. You want to change one of the mirrors or got a scratch on the inside? Just call me.",
                "country"=> "Magyarország",
                "postal_code"=>1185,
                "city"=>"Budapest",
                "address"=>"Nyiregyhaza street 54.",
                "profile_pic"=>"kiki.jpg",
                "profession"=>"car locksmith",
                "user_id"=> 2
            ],
            [
                "introduction" => "It's me Bandi. I feel familiar not only with cars but with the motorbikes as well. If you have anything that needs a fix, you can find me here.",
                "country"=> "Magyarország",
                "postal_code"=>1186,
                "city"=>"Budapest",
                "address"=>"Kis street 20.",
                "profile_pic"=>"bandi.jpg",
                "profession"=>"engine professor",
                "user_id"=> 7
            ],
            [
                "introduction" => "It's Béla here. Im just working around cars and stuff. Im not professional yet, but I am doing a serious job. You won't regret if you call me.",
                "country"=> "Magyarország",
                "postal_code"=>1187,
                "city"=>"Budapest",
                "address"=>"Nagy street 63.",
                "profile_pic"=>"mechanic2.jpg",
                "profession"=>"mechanic",
                "user_id"=> 3
            ],
            [
                "introduction" => "Listen everybody it's Pista Kis here. One of the best mechanics in town. I can fix nearly anything that has wheels. Give me a call.",
                "country"=> "Magyarország",
                "postal_code"=>1187,
                "city"=>"Budapest",
                "address"=>"Nagy street 63.",
                "profile_pic"=>"mechanic1.jpg",
                "profession"=>"race engineer",
                "user_id"=> 5
            ],
        ]);
    }
}
