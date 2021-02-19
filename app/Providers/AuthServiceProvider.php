<?php

namespace App\Providers;

// use Laravel\Passport\Passport; 
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\User;

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
        // Passport::routes();
        Gate::define('isAdmin',function($user) {
            return ($user->role == 0 ) ? true : false;
        });

         Gate::define('sitePatient',function($user) {
            return ($user->role == 1) ? true : false;
        });

        Gate::define('siteDoctor',function($user) {
            return ($user->role == 2) ? true : false;
        });

        Gate::define('sitePharmacist',function($user) {
            return ($user->role == 3) ? true : false;
        });
    }
}
