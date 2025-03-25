<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Appointment 1 has employees, 1, 2 and 3
        DB::table("appointment_employee")->insert([
            "appointment_id" => 1,
            "employee_id" => 1
        ]);

        DB::table("appointment_employee")->insert([
            "appointment_id" => 1,
            "employee_id" => 2
        ]);

        DB::table("appointment_employee")->insert([
            "appointment_id" => 1,
            "employee_id" => 3
        ]);

        // Appointment 2 has employees, 2, 3, 4 and 5
        DB::table("appointment_employee")->insert([
            "appointment_id" => 2,
            "employee_id" => 2
        ]);

        DB::table("appointment_employee")->insert([
            "appointment_id" => 2,
            "employee_id" => 3
        ]);

        DB::table("appointment_employee")->insert([
            "appointment_id" => 2,
            "employee_id" => 4
        ]);

        DB::table("appointment_employee")->insert([
            "appointment_id" => 2,
            "employee_id" => 5
        ]);
    }
}
