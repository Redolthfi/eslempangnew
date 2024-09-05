<?php

namespace App\Providers;

use App\Policies\RolePolicy;
use Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('access', [RolePolicy::class, 'access']);
    }
}
