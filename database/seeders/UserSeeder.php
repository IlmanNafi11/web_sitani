<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            "name"=> "superman",
            "email"=> "admin@gmail.com",
            "password"=> bcrypt("password"),
            "no_hp"=> "0851234567890",
            "alamat"=> "nganjuk",
            "role"=> "super admin",
        ]);
    }
}
