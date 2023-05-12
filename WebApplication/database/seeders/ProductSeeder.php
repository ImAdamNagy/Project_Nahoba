<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                "seller_id" => 2,
                "product_name" => "Steering wheel",
                "product_price" => 8000,
                "types_id" => 2,
                "car_typeId" => 1,
                "product_img" => "steer.jpg",
                "product_description" => "Used steering wheel for audi",
                "product_location" => "Budapest 18.",
                "product_enable" => true
            ],
            [
                "seller_id" => 2,
                "product_name" => "Clutch",
                "product_price" => 4000,
                "types_id" => 11,
                "car_typeId" => 9,
                "product_img" => "clutch.jpg",
                "product_description" => "Clutch top",
                "product_location" => "Budapest 10.",
                "product_enable" => true
            ],
            [
                "seller_id" => 2,
                "product_name" => "Front light",
                "product_price" => 11000,
                "types_id" => 8,
                "car_typeId" => 15,
                "product_img" => "opellight.jpg",
                "product_description" => "Front left light",
                "product_location" => "Budapest 20.",
                "product_enable" => true
            ],
            [
                "seller_id" => 4,
                "product_name" => "Front bumper",
                "product_price" => 6000,
                "types_id" => 16,
                "car_typeId" => 1,
                "product_img" => "opelcoolingfront.jpg",
                "product_description" => "Brand new front bumper",
                "product_location" => "Budapest 20.",
                "product_enable" => true
            ],
            [
                "seller_id" => 4,
                "product_name" => "Rear light",
                "product_price" => 7300,
                "types_id" => 8,
                "car_typeId" => 4,
                "product_img" => "rearlight.jpg",
                "product_description" => "Rear light for sedan models. It is used but functioning perfectly",
                "product_location" => "Budapest 6.",
                "product_enable" => true
            ],
            [
                "seller_id" => 4,
                "product_name" => "Trunk lock",
                "product_price" => 500,
                "types_id" => 3,
                "car_typeId" => 2,
                "product_img" => "backpack.jpg",
                "product_description" => "Used lock for trunks. Still capable of locking",
                "product_location" => "Budapest 19.",
                "product_enable" => true
            ],
            [
                "seller_id" => 3,
                "product_name" => "Two reflector front light",
                "product_price" => 7000,
                "types_id" => 3,
                "car_typeId" => 2,
                "product_img" => "cata.jpg",
                "product_description" => "Brand new frontlight with stronger capability of lighting.",
                "product_location" => "Budapest 13.",
                "product_enable" => true
            ],
            [
                "seller_id" => 3,
                "product_name" => "Steer switches",
                "product_price" => 16000,
                "types_id" => 2,
                "car_typeId" => 20,
                "product_img" => "steerswitch.jpg",
                "product_description" => "A pair of steer switches",
                "product_location" => "Budapest 12.",
                "product_enable" => false
            ],
            [
                "seller_id" => 3,
                "product_name" => "Rear wing",
                "product_price" => 18000,
                "types_id" => 5,
                "car_typeId" => 17,
                "product_img" => "wing.jpg",
                "product_description" => "Medium sized rear wing",
                "product_location" => "Budapest 15.",
                "product_enable" => false
            ],
            [
                "seller_id" => 3,
                "product_name" => "Mirror",
                "product_price" => 9000,
                "types_id" => 16,
                "car_typeId" => 10,
                "product_img" => "leftmirro.jpg",
                "product_description" => "Factory new left mirror",
                "product_location" => "Budapest 13.",
                "product_enable" => false
            ]
        ]);
    }
}
