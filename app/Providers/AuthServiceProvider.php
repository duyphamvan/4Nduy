<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        Gate::define('view-admin.admin', function ($user) {

            if ($user->role == "1") {

                return true;

            }

            return false;

        });


//        Gate::define('view-home.viewhome', function ($user) {
//
//            if ($user->role == "1" || $user->role == "0") {
//
//                return true;
//
//            }
//
//            return false;
//
//        });



        //
    }
}
