<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperAppointmentService
 */
class AppointmentService extends Model
{
    protected $fillable = [
        "appointment_id",
        "service_id"
    ];

    protected $table = "appointment_service";
}
