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
            return $user->role === 'System Administrator';
        });

        Gate::define('isSchoolAdministrator', function($user){
            return $user->role === 'School Administrator';
        });

        Gate::define('isProgramHead', function($user){
            return $user->role === 'Program Head';
        });

        Gate::define('isAdviser', function($user){
            return $user->role === 'Adviser';
        });

        Gate::define('isApplicant', function($user){
            return $user->role === 'Applicant';
        });


        /*You may authorize multiple actions at a time with the any or none methods:

        if (Gate::any(['update-post', 'delete-post'], $post)) {
            // The user can update or delete the post
        }

       if (Gate::none(['update-post', 'delete-post'], $post)) {
        // The user cannot update or delete the post
       }*/

    }
}
