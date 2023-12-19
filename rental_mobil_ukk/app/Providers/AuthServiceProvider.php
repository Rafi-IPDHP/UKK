<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('isAdmin', function($user) {
            return $user->role === 'admin';
        });
        Gate::define('isPetugas', function($user) {
            return $user->role === 'petugas';
        });
        Gate::define('isPenyewa', function($user) {
            return $user->role === 'penyewa';
        });
    }
}
