<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Appointment 1 has-> clients 1, 2, and 5.
        DB::table("appointment_client")->insert([
            "appointment_id" => 1,
            "client_id" => 1
        ]);

        DB::table("appointment_client")->insert([
            "appointment_id" => 1,
            "client_id" => 2
        ]);

        DB::table("appointment_client")->insert([
            "appointment_id" => 1,
            "client_id" => 5
        ]);

        // Appointment 3 has-> clients 2, 3, 4, and 5
        DB::table("appointment_client")->insert([
            "appointment_id" => 3,
            "client_id" => 2
        ]);

        DB::table("appointment_client")->insert([
            "appointment_id" => 3,
            "client_id" => 3
        ]);

        DB::table("appointment_client")->insert([
            "appointment_id" => 3,
            "client_id" => 4
        ]);

        DB::table("appointment_client")->insert([
            "appointment_id" => 3,
            "client_id" => 5
        ]);
    }
}
