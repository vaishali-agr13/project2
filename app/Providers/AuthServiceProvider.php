<?php 

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Gate::define('isAdmin', function ($user) {
                return $user->role === 'admin';
        });

        Gate::define('isCandidate', function ($user) {
                return $user->role === 'candidate';
        });
    }
}