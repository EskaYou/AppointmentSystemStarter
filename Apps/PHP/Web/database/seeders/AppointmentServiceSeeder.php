<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Appointment 1 has-> service 1, 2, and 3.
        DB::table("appointment_service")->insert([
            "appointment_id" => 1,
            "service_id" => 1
        ]);

        DB::table("appointment_service")->insert([
            "appointment_id" => 1,
            "service_id" => 2
        ]);

        DB::table("appointment_service")->insert([
            "appointment_id" => 1,
            "service_id" => 3
        ]);


        // Appointment 2 has-> service 5, 3, and 1.
        DB::table("appointment_service")->insert([
            "appointment_id" => 2,
            "service_id" => 5
        ]);

        DB::table("appointment_service")->insert([
            "appointment_id" => 2,
            "service_id" => 3
        ]);

        DB::table("appointment_service")->insert([
            "appointment_id" => 2,
            "service_id" => 1
        ]);

        // Appointment 5 has-> service 4, 4?, and 2
        // DB::table("appointment_service")->insert([
        //     "appointment_id" => 5,
        //     "service_id" => 4
        // ]);

        // DB::table("appointment_service")->insert([
        //     "appointment_id" => 5,
        //     "service_id" => 4
        // ]);

        // DB::table("appointment_service")->insert([
        //     "appointment_id" => 5,
        //     "service_id" => 2
        // ]);
    }
}
