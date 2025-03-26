<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("employees")->insert([
            "user_id" => 1,
            "employee_type_id" => 1
        ]);

        // DB::table("employees")->insert([
        //     "user_id" => 2
        // ]);

        // DB::table("employees")->insert([
        //     "user_id" => 3
        // ]);

        // DB::table("employees")->insert([
        //     "user_id" => 4
        // ]);

        // DB::table("employees")->insert([
        //     "user_id" => 5
        // ]);
    }
}
