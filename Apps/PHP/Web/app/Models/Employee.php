<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    protected $fillable = ["is_present", "user_id", "employee_type_id"];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function appointments(): BelongsToMany
    {
        return $this->belongsToMany(Appointment::class);
    }

    public function employee_type(): BelongsTo
    {
        return $this->belongsTo(EmployeeType::class, "employee_type_id");
    }
}
