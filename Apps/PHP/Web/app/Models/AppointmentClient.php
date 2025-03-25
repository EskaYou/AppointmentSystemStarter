<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentClient extends Model
{
    protected $fillable = [
        "appointment_id",
        "client_id"
    ];

    protected $table = "appointment_client";
}
