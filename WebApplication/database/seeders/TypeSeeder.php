<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            ["type" => "Wheel"],
            ["type" => "Engine"],
            ["type" => "Battery"],
            ["type" => "Turbo"],
            ["type" => "Brake Pads"],
            ["type" => "Brake Disc"],
            ["type" => "Bulb"],
            ["type" => "Air Filter"],
            ["type" => "Oil Filter"],
            ["type" => "Switch"],
            ["type" => "Exhaust"],
            ["type" => "Spark Plug"],
            ["type" => "Suspension"],
            ["type" => "Lubricants & Fluids"],
            ["type" => "Other"],
        ]);
    }
}
