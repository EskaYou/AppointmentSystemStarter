<?php

namespace Database\Seeders;

use App\Models\Service;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("services")->insert([
            "service_name" => "Service 1"
        ]);

        DB::table("services")->insert([
            "service_name" => "Service 2"
        ]);

        DB::table("services")->insert([
            "service_name" => "Service 3"
        ]);

        DB::table("services")->insert([
            "service_name" => "Service 4"
        ]);

        DB::table("services")->insert([
            "service_name" => "Service 5"
        ]);
    }
}
