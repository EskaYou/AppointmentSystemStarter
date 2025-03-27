<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClientPolicy
{
    private function authenticateUser(User $user): bool
    {
        $type_name = $user->employee->employee_type->type_name;
        if($type_name === "manager" || $type_name === "admin")
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->authenticateUser($user);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Client $client): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $this->authenticateUser($user);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Client $client): bool
    {
        return $this->authenticateUser($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Client $client): bool
    {
        $type_name = $user->employee->employee_type->type_name;
        if($type_name === "manager")
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Client $client): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Client $appointment): bool
    {
        $type_name = $user->employee->employee_type->type_name;
        if($type_name === "manager")
        {
            return true;
        }
        return false;
    }

    public function deleteAny(User $user): bool
    {
        $type_name = $user->employee->employee_type->type_name;
        if($type_name === "manager")
        {
            return true;
        }
        return false;
    }
}
