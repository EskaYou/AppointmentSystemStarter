<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentEmployee extends Model
{
    protected $fillable = [
        "appointment_id",
        "employee_id"
    ];

    protected $table = "appointment_employee";
}
