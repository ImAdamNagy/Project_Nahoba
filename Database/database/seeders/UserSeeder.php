<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                "name" => "Kovács Admin",
                "user_type" => 2,
                "email" => "admin@admin.com",
                "tel" => "06304558183",
                "address" => "mucsaröcsöge",
                "username" => "admin",
                "password" => Hash::make('admin123')
            ]
        ]);
    }
}
