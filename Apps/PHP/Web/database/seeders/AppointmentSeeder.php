<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("appointments")->insert([
            "starts_at" => 0,
            "ends_at" => 0
        ]);

        DB::table("appointments")->insert([
            "starts_at" => 0,
            "ends_at" => 0
        ]);

        DB::table("appointments")->insert([
            "starts_at" => 0,
            "ends_at" => 0
        ]);

        DB::table("appointments")->insert([
            "starts_at" => 0,
            "ends_at" => 0
        ]);

        DB::table("appointments")->insert([
            "starts_at" => 0,
            "ends_at" => 0
        ]);
    }
}
