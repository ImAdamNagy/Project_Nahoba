<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carTypes')->insert([
            ["name" => "Daewoo Kalos"
            , "vintage" => "2003"
            ],
            ["name" => "Ford Focus"
            , "vintage" => "2001"
            ],
            ["name" => "Ford Focus"
            , "vintage" => "2002"
            ],
            ["name" => "Ford Focus"
            , "vintage" => "2003"
            ],
            ["name" => "Opel B Zafira"
            , "vintage" => "2015"
            ]
        ]);
    }
}