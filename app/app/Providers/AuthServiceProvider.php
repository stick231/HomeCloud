<?php

namespace App\Providers;

use App\Models\FamilyUser;
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

        Gate::define('admin-only', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('family-admin-only', function ($user, $familyId) {
            $family = $user->families()->where('family_id', $familyId)->first();
        
            return $family && $family->pivot->role === 'admin' || $user->role === 'admin';
        });
        
    }
}