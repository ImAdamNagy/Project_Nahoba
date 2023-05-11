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
                "seller_id" => 1,
                "product_name" => "Wrench",
                "product_price" => 1500,
                "types_id" => 3,
                "car_typeId" => 1,
                "product_img" => "wrench.jpg",
                "product_description" => "It is a long established fact that a reader 
                will be distracted",
                "product_location" => "Budapest 18.",
                "product_enable" => true
            ],
            [
                "seller_id" => 1,
                "product_name" => "V8 Engine",
                "product_price" => 5000,
                "types_id" => 1,
                "car_typeId" => 1,
                "product_img" => "engine.jpg",
                "product_description" => "It is a long established fact that a reader 
                will be distracted",
                "product_location" => "Budapest 10.",
                "product_enable" => true
            ],
            [
                "seller_id" => 1,
                "product_name" => "Catalyst",
                "product_price" => 3000,
                "types_id" => 3,
                "car_typeId" => 1,
                "product_img" => "cata.jpg",
                "product_description" => "It is a long established fact that a reader 
                will be distracted",
                "product_location" => "Budapest 20.",
                "product_enable" => true
            ],
            [
                "seller_id" => 1,
                "product_name" => "Catalyst",
                "product_price" => 3500,
                "types_id" => 3,
                "car_typeId" => 1,
                "product_img" => "cata.jpg",
                "product_description" => "It is a long established fact that a reader 
                will be distracted",
                "product_location" => "Budapest 20.",
                "product_enable" => true
            ],
            [
                "seller_id" => 1,
                "product_name" => "Catalyst",
                "product_price" => 1500,
                "types_id" => 3,
                "car_typeId" => 2,
                "product_img" => "cata.jpg",
                "product_description" => "It is a long established fact that a reader 
                will be distracted",
                "product_location" => "Budapest 20.",
                "product_enable" => true
            ],
            [
                "seller_id" => 1,
                "product_name" => "Catalyst",
                "product_price" => 500,
                "types_id" => 3,
                "car_typeId" => 2,
                "product_img" => "cata.jpg",
                "product_description" => "It is a long established fact that a reader 
                will be distracted",
                "product_location" => "Budapest 20.",
                "product_enable" => true
            ],
            [
                "seller_id" => 1,
                "product_name" => "Catalyst",
                "product_price" => 7000,
                "types_id" => 3,
                "car_typeId" => 2,
                "product_img" => "cata.jpg",
                "product_description" => "It is a long established fact that a reader 
                will be distracted",
                "product_location" => "Budapest 20.",
                "product_enable" => false
            ]
        ]);
    }
}