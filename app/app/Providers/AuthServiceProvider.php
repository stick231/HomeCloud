<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('create-family', function ($user) {
            return $user->role === 'admin';
        });
        Gate::define('update-family', function($user){
            return $user->role === 'admin';
        });
        Gate::define('delete-family', function($user){
            return $user->role === 'admin';
        });
        Gate::define('add-family-member', function($user){
            return $user->role === 'admin';
        });
    }
}