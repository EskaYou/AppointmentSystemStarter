<?php

namespace App\Providers;

use App\Models\Appointment;
use App\Policies\ServicePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\Service;
use App\Models\User;
use App\Policies\AppointmentPolicy;
use App\Policies\UserPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Policies
        Gate::policy(Service::class, ServicePolicy::class);
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Appointment::class, AppointmentPolicy::class);
    }
}
