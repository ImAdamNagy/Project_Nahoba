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

            ["name" => "Audi 100", "year" => "1994"],
            ["name" => "Audi 100", "year" => "1993"],
            ["name" => "Audi 100", "year" => "1992"],
            ["name" => "Audi 80", "year" => "1992"],
            ["name" => "Audi 90", "year" => "1994"],
            ["name" => "Audi 90", "year" => "1993"],
            ["name" => "Audi A3", "year" => "2018"],
            ["name" => "Audi A3", "year" => "2017"],
            ["name" => "Audi A3", "year" => "2016"],

            ["name" => "Daewoo Kalos", "year" => "2003"],
            ["name" => "Daewoo Lanos", "year" => "2000"],
            ["name" => "Daewoo Lanos", "year" => "2002"],

            ["name" => "Ford Focus", "year" => "2001"],
            ["name" => "Ford Focus", "year" => "2002"],
            ["name" => "Ford Focus", "year" => "2003"],
            
            
            ["name" => "FIAT 500", "year" => "2016"],
            ["name" => "FIAT 500", "year" => "2014"],
            ["name" => "FIAT 500", "year" => "2017"],
            ["name" => "FIAT 500", "year" => "2019"],

            ["name" => "MAZDA 323", "year" => "1994"],
            ["name" => "MAZDA 626", "year" => "2002"],
            ["name" => "MAZDA 626", "year" => "2000"],

            ["name" => "Volkswagen Arteon", "year" => "2019"],
            ["name" => "Volkswagen Atlas", "year" => "2019"],
            ["name" => "Volkswagen Atlas", "year" => "2018"],
            ["name" => "Volkswagen CC", "year" => "2017"],
            ["name" => "Volkswagen CC", "year" => "2014"],

            ["name" => "Volvo 240", "year" => "1993"],
            ["name" => "Volvo 240", "year" => "1992"],
            ["name" => "Volvo 740", "year" => "1992"],
            ["name" => "Volvo 850", "year" => "1997"],

            ["name" => "Toyota 4Runner", "year" => "2018"],
            ["name" => "Toyota 4Runner", "year" => "2018"],
            ["name" => "Toyota Avalon", "year" => "2020"],
            ["name" => "Toyota Avalon", "year" => "2019"],

            ["name" => "smart fortwo", "year" => "2015"],
            ["name" => "smart fortwo", "year" => "2014"],
            ["name" => "smart fortwo cabrio", "year" => "2017"],

            ["name" => "Honda Accord", "year" => "2016"],
            ["name" => "Honda Accord", "year" => "2015"],
            ["name" => "Honda CR-V", "year" => "2018"],
            ["name" => "Honda CR-V", "year" => "2014"],
            ["name" => "Other", "year" => null],
        ]);
    }
}