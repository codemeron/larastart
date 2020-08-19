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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isSystemAdministrator', function($user){
            return $user->type === 'System Administrator';
        });

        Gate::define('isSchoolAdministrator', function($user){
            return $user->type === 'School Administrator';
        });

        Gate::define('isProgramHead', function($user){
            return $user->type === 'Program Head';
        });

        Gate::define('isAdviser', function($user){
            return $user->type === 'Adviser';
        });

    }
}
