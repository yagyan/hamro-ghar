<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
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
        
        Gate::define('isAdmin', function ($user) {
            return $user->usertype === 'Admin';
        });

        Gate::define('isAgent',function($user){
            return $user->usertype === 'Agent';
        });
        Gate::define('isCustomer',function($user){
            return $user->usertype === 'Customer';
        });

        Passport::routes();

        //
    }
}
