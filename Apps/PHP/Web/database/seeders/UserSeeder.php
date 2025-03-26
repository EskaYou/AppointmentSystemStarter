<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            "name" => "Eska",
            "email" => "eskayou11@gmail.com",
            "password" => Hash::make("123")
        ]);

        // DB::table("users")->insert([
        //     "name" => "You",
        //     "email" => "rizkymk11@gmail.com",
        //     "password" => Hash::make("123")
        // ]);

        // DB::table("users")->insert([
        //     "name" => "User 1",
        //     "email" => "user1@testmail.com",
        //     "password" => Hash::make("123")
        // ]);

        // DB::table("users")->insert([
        //     "name" => "User 2",
        //     "email" => "user2@testmail.com",
        //     "password" => Hash::make("123")
        // ]);

        // DB::table("users")->insert([
        //     "name" => "User 3",
        //     "email" => "user3@testmail.com",
        //     "password" => Hash::make("123")
        // ]);
    }
}
