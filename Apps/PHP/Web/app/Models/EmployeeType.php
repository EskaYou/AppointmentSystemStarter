<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmployeeType extends Model
{
    protected $fillable = [
        "type_name"
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
