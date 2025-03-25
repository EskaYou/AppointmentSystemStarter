<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("clients")->insert([
            "name" => "Client 1",
            "email" => "client1@testmail.com",
            "phone_number" => "080000000001"
        ]);

        DB::table("clients")->insert([
            "name" => "Client 2",
            "email" => "client2@testmail.com",
            "phone_number" => "080000000002"
        ]);

        DB::table("clients")->insert([
            "name" => "Client 3",
            "email" => "client3@testmail.com",
            "phone_number" => "080000000003"
        ]);

        DB::table("clients")->insert([
            "name" => "Client 4",
            "email" => "client4@testmail.com",
            "phone_number" => "080000000004"
        ]);

        DB::table("clients")->insert([
            "name" => "Client 5",
            "email" => "client5@testmail.com",
            "phone_number" => "080000000005"
        ]);
    }
}
